<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patriarch;
use App\Sign;

class patriController extends Controller
{
	public function showPatriarchs(Request $request)
	{

		if($request->get('openid')){
			$openid = $request->get('openid');
			$data = Patriarch::where('openid',$openid)->get();
			foreach($data as $da){
    		//echo gettype($da->teach_feature);

				$a = explode('，',$da->subject);
				$b = explode('，',$da->schedule);

				$da->id = $da->teacher_id;

				$da->subject = $a;
				$da->schedule = $b;
				$da->id = $da->patriarch_id;
			}
			$message = [];
			$message['data'] = $data;
			return json_encode($message);
		}else{
			$data = Patriarch::all();
    	//$teach_feature = explode(',',$data->teach_feature);

			foreach($data as $da){
    		//echo gettype($da->teach_feature);

				$a = explode('，',$da->subject);
				$b = explode('，',$da->schedule);

				$da->id = $da->teacher_id;

				$da->subject = $a;
				$da->schedule = $b;
				$da->id = $da->patriarch_id;
			}

			$message = [];

			$message['data']['patriarch_list'] = $data;
			$message['data']['page_count'] = 13;
			$message['status_code'] = 200;
			$message['message'] = "";

			echo json_encode($message,320);
		}
		
	}

	public function storePatriarch(Request $request)
	{
		$patriarch_data = $request->getContent();
		$patriarch_da = json_decode($patriarch_data);

		$grade = $patriarch_da->grade;
		$min_wage = intval($patriarch_da->min_wage);
		$name = $patriarch_da->name;
		$openid = $patriarch_da->openid;
		$schedule = implode('，',$patriarch_da->schedule);
		$sex = $patriarch_da->sex;
		$site = $patriarch_da->site;
		$std_detail = $patriarch_da->std_detail;
		$std_feature = $patriarch_da->std_feature;
		$subject = implode('，',$patriarch_da->subject);
		$tch_feature = $patriarch_da->tch_feature;
		$tch_require = $patriarch_da->tch_require;
		$tch_sex = $patriarch_da->tch_sex;

		$patriarch = new Patriarch();

		$patriarch->grade = $grade;
		$patriarch->min_wage = $min_wage;
		$patriarch->name = $name;
		$patriarch->openid = $openid;
		$patriarch->schedule = $schedule;
		$patriarch->sex = $sex;
		$patriarch->site = $site;
		$patriarch->std_detail = $std_detail;
		$patriarch->std_feature = $std_feature;
		$patriarch->subject = $subject;
		$patriarch->tch_feature = $tch_feature;
		$patriarch->tch_require = $tch_require;
		$patriarch->tch_sex = $tch_sex;
		$patriarch->resumes_count = 0;

		$patriarch->save();

		$return_data = [];
		$return_data['status_code'] = 200;
		return json_encode($return_data);
	}

	public function showPatriarchDetail(Request $request){

		$openid = $request->input('openid');
		$patriarch_id = $request->input('patriarch_id');
		$data = Patriarch::find($patriarch_id);

		$a = explode('，',$data->schedule);
		$b = explode('，',$data->subject);


		$data->schedule = $a;
		$data->subject = $b;
		$data->id = $data->patriarch_id;

		$message = [];
		$message['data'] = $data;

		$b_patriarch = Sign::where('openid',$openid)->where('patriarch_id',$patriarch_id)->get();
		$num = count($b_patriarch);
		if($num == 0){		
			$message['isPost'] = 0;
		}else{		
			$message['isPost'] = 1;
		}
		$message['status_code'] = 200;
		$message['message'] = "";

		return json_encode($message);
	}

	public function getDeliverCount(Request $request){
    	//$openid = $request->get('openid');
		$patriarch_id = $request->get('patriarch_id');

		$data = Patriarch::find($patriarch_id);
   	
 		//$message = [];
		//$message['data'] = $data->resumes_count;
        return json_encode($data->resumes_count);

	}

	public function postDeliver(Request $request){

		$openid = $request->input('openid');
		$patriarch_id = $request->input('patriarch_id');

		$b_patriarch = Sign::where('openid',$openid)->where('patriarch_id',$patriarch_id)->get();
		$num = count($b_patriarch);
		if($num == 0){
			$data = Patriarch::find($patriarch_id);

			$data->resumes_count = $data->resumes_count + 1;
			$resumes_count = $data->resumes_count;

			$data->save();

			$data_s = new Sign();

			$data_s->openid = $openid;
			$data_s->patriarch_id = $patriarch_id;

			$data_s->save();

			

			$message['status_code'] = 200;
			$message['resumes_count'] = $resumes_count;

			return json_encode($message);
		}else{

			$message = [];
			$message['status_code'] = 400;

			return json_encode($message);
		}


	}



}
