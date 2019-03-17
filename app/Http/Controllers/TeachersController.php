<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Teacher_ex;

class TeachersController extends Controller
{
    public function showTeachers(){
    	$data = Teacher::all();
    	//$teach_feature = explode(',',$data->teach_feature);
    	
    	foreach($data as $da){
    		//echo gettype($da->teach_feature);
        $da->teach_exprience = Teacher_ex::where('teacher_id',$da->teacher_id)->get();
    		$a = explode('，',$da->teach_feature);
    		$b = explode('，',$da->teach_subject);
        $c = explode('，',$da->teach_grade);
        $d = explode('，',$da->teach_county);
        $e = explode('，',$da->region);
   			//echo json_encode($a,320);
   			$da->teach_feature = $a;
   			$da->teach_subject = $b;
        $da->teach_grade = $c;
        $da->teach_county = $d;
        $da->region = $e;

   			//echo json_encode($da->teach_feature);
    	}

      $message = [];
      $message['data'] = $data;
      $message['status_code'] = 200;
      $message['message'] = "";

    	echo json_encode($message,320);
    }

    public function storeTeacher(Request $request){
      $teacher = new Teacher();
      $teacher_ex = new Teacher_ex();

      $teacher_data = $request->getContent();
      $teacher_da = json_decode($teacher_data);
      //echo json_encode($teacher_da->grade,320);

      $grade = $teacher_da->grade;
      $introduction = $teacher_da->introduction;
      $major = $teacher_da->major;
      $min_wage = intval($teacher_da->min_wage);
      $name = $teacher_da->name;
      $openid = "oWo705Yx2B4zPMJxAddz7QbNHSHA";
      $school = $teacher_da->school;
      $sex = $teacher_da->sex;
      $teach_city = $teacher_da->teach_city;
      $teach_review = $teacher_da->teach_review;
      $tel = $teacher_da->tel;
      $wechat = $teacher_da->wechat;

      $region = implode('，',$teacher_da->region);
      $teach_county = implode('，',$teacher_da->teach_county);
      $teach_feature = implode('，',$teacher_da->teach_feature);
      $teach_grade = implode('，',$teacher_da->teach_grade);
      $teach_schedule = implode('，',$teacher_da->teach_schedule);
      $teach_subject = implode('，',$teacher_da->teach_subject);


      foreach($teacher_da->teach_exprience as $da){
        $start_time = $da->start_time;
        $stop_time = $da->stop_time;
        $description = $da->description;
      }

    }
}
