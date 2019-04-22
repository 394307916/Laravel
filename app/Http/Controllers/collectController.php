<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Teacher_ex;
use App\Alluser;
use App\Order;
use App\Patriarch;
use App\NewInfo;
use App\CollectNew;
use App\CollectTea;


class collectController extends Controller
{
    public function shoucangTeacher(Request $request){

    	$openid = $request->get('openid');
    	$teacher_id = $request->get('teacher_id');

    	$is_shoucang = CollectTea::where('openid',$openid)->where('teacher_id',$teacher_id)->get();
		$num = count($is_shoucang);

		$message = [];

		if($num == 0){

			$collect = new CollectTea();

			$collect->openid = $openid;
			$collect->teacher_id = $teacher_id;

			$collect->save();

			$message['status_code'] = 200;
			$message['message'] = '收藏成功';
			return json_encode($message);

		}else{

			$collect = CollectTea::where('openid',$openid)->where('teacher_id',$teacher_id)->delete();


			$message['status_code'] = 200;
			$message['message'] = '取消收藏';
			return json_encode($message);

		}
    }

    public function shoucangNew(Request $request){

    	$openid = $request->get('openid');
    	$new_id = $request->get('new_id');

    	$is_shoucang = CollectNew::where('openid',$openid)->where('new_id',$new_id)->get();
		$num = count($is_shoucang);

		$message = [];

		if($num == 0){

			$collect = new CollectNew();

			$collect->openid = $openid;
			$collect->new_id = $new_id;

			$collect->save();

			$message['status_code'] = 200;
			$message['message'] = '收藏成功';
			return json_encode($message);

		}else{

			$collect = CollectNew::where('openid',$openid)->where('new_id',$new_id)->delete();

			$message['status_code'] = 200;
			$message['message'] = '取消收藏';
			return json_encode($message);

		}
    }

    public function showCollectNew(Request $request){

    	$openid = $request->get('openid');

    	

    }

    public function showCollectTeacher(Request $request){
    	
    	$openid = $request->get('openid');


    }



}
