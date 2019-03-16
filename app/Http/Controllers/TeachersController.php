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
   			//echo json_encode($a,320);
   			$da->teach_feature = $a;
   			$da->teach_subject = $b;
   			//echo json_encode($da->teach_feature);
    	}

    	echo json_encode($data,320);
    }
}
