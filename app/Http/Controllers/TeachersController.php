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
 /*       foreach ($da->teach_exprience as $da) {
          if($da->ex_idd != null){
            echo $da->ex_id;
          }else{
            echo "no";
          }
        }*/
        
      }

      $message = [];
      $message['data'] = $data;
      $message['status_code'] = 200;
      $message['message'] = "";

      echo json_encode($message,320);

      //echo count(Teacher::where('openid','oWo705Yx2B4zPMJxAddz7QbNHSHA')->get()); 
    }   

    public function storeTeacher(Request $request){

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

      
      $b_teacher = Teacher::where('openid',$openid)->get();
      $num = count($b_teacher);
      if($num == 0){
        $teacher = new Teacher();
        $teacher->openid = $openid;
        $teacher->grade = $grade;
        $teacher->introduction = $introduction;
        $teacher->major = $major;
        $teacher->min_wage = $min_wage;
        $teacher->name = $name;
        $teacher->school = $school;
        $teacher->sex = $sex;
        $teacher->teach_city = $teach_city;
        $teacher->teach_review = $teach_review;
        $teacher->tel = $tel;
        $teacher->wechat = $wechat;
        $teacher->region = $region;
        $teacher->teach_county = $teach_county;
        $teacher->teach_feature = $teach_feature;
        $teacher->teach_grade = $teach_grade;
        $teacher->teach_schedule = $teach_schedule;
        $teacher->teach_subject = $teach_subject;

        $teacher->save();
        foreach($teacher_da->teach_exprience as $da){
          $teacher_ex = new Teacher_ex();
          $start_time = $da->start_time;
          $stop_time = $da->stop_time;
          $description = $da->description;
          $teacher_ex->start_time = $start_time;
          $teacher_ex->stop_time = $stop_time;
          $teacher_ex->description = $description;
          $teacher_idd = Teacher::where('openid',$openid)->get();
          foreach ($teacher_idd as $idd) {
            $teacher_id = $idd->teacher_id;
          }
          $teacher_ex->teacher_id = $teacher_id;
          $teacher_ex->save();

        }
        $return_data = [];
        $return_data['status_code'] = 200;
        return json_encode($return_data);
      }else{
        $te = Teacher::where('openid',$openid)->get();

        foreach ($te as $teacher) {
          $teacher->grade = $grade;
          $teacher->introduction = $introduction;
          $teacher->major = $major;
          $teacher->min_wage = $min_wage;
          $teacher->name = $name;
          $teacher->school = $school;
          $teacher->sex = $sex;
          $teacher->teach_city = $teach_city;
          $teacher->teach_review = $teach_review;
          $teacher->tel = $tel;
          $teacher->wechat = $wechat;
          $teacher->region = $region;
          $teacher->teach_county = $teach_county;
          $teacher->teach_feature = $teach_feature;
          $teacher->teach_grade = $teach_grade;
          $teacher->teach_schedule = $teach_schedule;
          $teacher->teach_subject = $teach_subject;
          $teacher->save();
        }

        $teacher_idd = Teacher::where('openid',$openid)->get();
        foreach ($teacher_idd as $idd) {
          $teacher_id = $idd->teacher_id;
        }
        Teacher_ex::where('teacher_id',$teacher_id)->delete();
        foreach($teacher_da->teach_exprience as $da){

/*          if(property_exists($da,'ex_id') != 1){
            $teacher_ex = new Teacher_ex();
            $start_time = $da->start_time;
            $stop_time = $da->stop_time;
            $description = $da->description;
            $teacher_ex->start_time = $start_time;
            $teacher_ex->stop_time = $stop_time;
            $teacher_ex->description = $description;
            $teacher_idd = Teacher::where('openid',$openid)->get();
            foreach ($teacher_idd as $idd) {
              $teacher_id = $idd->teacher_id;
            }
            $teacher_ex->teacher_id = $teacher_id;
            $teacher_ex->save();

          }else{
            //echo $da->description;
            $teacher_ex = Teacher_ex::find($da->ex_id);
            $start_time = $da->start_time;
            $stop_time = $da->stop_time;
            $description = $da->description;
            $teacher_ex->start_time = $start_time;
            $teacher_ex->stop_time = $stop_time;
            $teacher_ex->description = $description;
            $teacher_ex->save();
          }*/
          $teacher_ex = new Teacher_ex();
          $start_time = $da->start_time;
          $stop_time = $da->stop_time;
          $description = $da->description;
          $teacher_ex->start_time = $start_time;
          $teacher_ex->stop_time = $stop_time;
          $teacher_ex->description = $description;
          $teacher_idd = Teacher::where('openid',$openid)->get();
          foreach ($teacher_idd as $idd) {
            $teacher_id = $idd->teacher_id;
          }
          $teacher_ex->teacher_id = $teacher_id;
          $teacher_ex->save();

        }       

        $return_data = [];
        $return_data['status_code'] = 200;
        return json_encode($return_data); 
      }

    }

    public function myTeacher(Request $request){
      $openid = $request->input('openid');
      $data = Teacher::where('openid',$openid)->get();
      foreach($data as $da){
        //echo gettype($da->teach_feature);
        $da->teach_exprience = Teacher_ex::where('teacher_id',$da->teacher_id)->get();
        $a = explode('，',$da->teach_feature);
        $b = explode('，',$da->teach_subject);
        $c = explode('，',$da->teach_grade);
        $d = explode('，',$da->teach_county);
        $e = explode('，',$da->region);
        $f = explode('，',$da->teach_schedule);
        //echo json_encode($a,320);
        $da->teach_feature = $a;
        $da->teach_subject = $b;
        $da->teach_grade = $c;
        $da->teach_county = $d;
        $da->region = $e;
        $da->teach_schedule = $f;
        //echo json_encode($da->teach_feature);
      }
      //$message = [];
      //$message['data'] = $data
      return json_encode($data);
    }

    
  }
