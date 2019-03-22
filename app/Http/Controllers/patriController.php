<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patriarch;

class patriController extends Controller
{
	public function showPatriarchs(Request $request)
	{

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
		$subject = implode('，',$patriarch_da->schedule);
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

		$patriarch->save();

		$return_data = [];
		$return_data['status_code'] = 200;
		return json_encode($return_data);
	}

	public function showPatriarchDetail(Request $request)
	{
		$patriarch_id = $request->input('patriarch_id');
		$data = Patriarch::find($patriarch_id);

		$a = explode('，',$data->schedule);
		$b = explode('，',$data->subject);


		$data->schedule = $a;
		$data->subject = $b;
		$data->id = $data->patriarch_id;

		$message = [];
		$message['data'] = $data;
		$message['status_code'] = 200;
		$message['message'] = "";

		return json_encode($message);
	}

}
