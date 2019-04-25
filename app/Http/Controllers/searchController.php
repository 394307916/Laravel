<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Teacher_ex;
use App\Alluser;

class searchController extends Controller
{
    public function searchTeacher(Request $request){

    	$order_wage = $request->input('order_wage');//0全部 1 高到低 2 低到高*/

    	$teach_county = $request->input('teach_county');

		$teach_grade = $request->input('teach_grade');  
		
		$teach_subject = $request->input('teach_subject');   	

		$teacher_sex = $request->input('teacher_sex');
		if($teacher_sex == "男女"){
			$teacher_sex = "";
		}   

		

		if($order_wage == "0"){
			$result = Teacher::where('teach_county', 'like', '%'.$teach_county.'%')->where('teach_grade', 'like', '%'.$teach_grade.'%')->where('sex', 'like', '%'.$teacher_sex.'%')->get();
		}else if($order_wage == "1"){
			$result = Teacher::where('teach_county', 'like', '%'.$teach_county.'%')->where('teach_grade', 'like', '%'.$teach_grade.'%')->where('sex', 'like', '%'.$teacher_sex.'%')->orderBy('min_wage','desc')->get();

		}else if($order_wage == "2"){
			$result = Teacher::where('teach_county', 'like', '%'.$teach_county.'%')->where('teach_grade', 'like', '%'.$teach_grade.'%')->where('sex', 'like', '%'.$teacher_sex.'%')->orderBy('min_wage','asc')->get();

		}

		$result = json_decode($result,true);

		foreach ($result as &$teacher) {
			foreach ($teach_subject as $subject) {
				if(strpos($teacher['teach_subject'],$subject) === false){
					$teacher = '';
					break;
				}
			}
		}

		for($n = 0;$n < count($result);$n++){

			if($result[$n] == ''){
				array_splice($result, $n, 1); 
			}

		}

		//echo json_encode($result);
			

		foreach($result as &$da){

			if($da !== ''){
				$da['teach_exprience'] = Teacher_ex::where('teacher_id',$da['teacher_id'])->get();
				$a = explode('，',$da['teach_feature']);
				$b = explode('，',$da['teach_subject']);
				$c = explode('，',$da['teach_grade']);
				$d = explode('，',$da['teach_county']);
				$e = explode('，',$da['region']);
				$f = explode('，',$da['teach_schedule']);
				$da['id'] = $da['teacher_id'];
				$da['teach_feature'] = $a;
				$da['teach_subject'] = $b;
				$da['teach_grade'] = $c;
				$da['teach_county'] = $d;
				$da['region'] = $e;
				$da['teach_schedule'] = $f;

				unset($da);
			}

      }

      $message = [];
      $message['data'] = $result;
      $message['status_code'] = 200;
      $message['message'] = "";

      echo json_encode($message);


    }
}
