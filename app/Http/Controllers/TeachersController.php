<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeachersController extends Controller
{
    public function showTeachers(){
    	$data = Teacher::all();
    	//$teach_feature = explode(',',$data->teach_feature);
    	
    	foreach($data as $da){
    		//echo gettype($da->teach_feature);
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
}
