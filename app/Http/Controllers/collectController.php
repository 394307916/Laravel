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


			$message['status_code'] = 300;
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

			$message['status_code'] = 300;
			$message['message'] = '取消收藏';
			return json_encode($message);

		}
    }

    public function showCollectNew(Request $request){

    	$openid = $request->get('openid');

    	$is_collect = CollectNew::where('openid',$openid)->get();

    	$num = count($is_collect);

    	$message = [];
		$message['data'] = [];

    	foreach ($is_collect as $da) {
    		$new_id = $da->new_id;

    		if($num != 0){

				$data = NewInfo::where('new_id',$new_id)->get();

			//return json_encode($data);
				$data = json_decode($data,true);

				foreach($data as &$da){	

					$img1 = $da['img1'];
					$img2 = $da['img2'];
					$img3 = $da['img3'];

					$imgArray1 = [$img1,$img2,$img3];

					$da['imgArray1'] = $imgArray1;

					array_push($message['data'], $da);

					unset($da);

				}

			}
    	}

    	$message['status_code'] = 200;
		echo json_encode($message);

    }

    public function showCollectTeacher(Request $request){
    	
    	$openid = $request->get('openid');

    	$is_collect = CollectTea::where('openid',$openid)->get();

    	$num = count($is_collect);

    	$message = [];
		$message['data'] = [];

    	foreach ($is_collect as $da) {
    		$teacher_id = $da->teacher_id;

    		if($num != 0){

				$data = Teacher::where('teacher_id',$teacher_id)->get();

			//return json_encode($data);
				$data = json_decode($data,true);

				foreach($data as $da){

					$da['teach_exprience'] = Teacher_ex::where('teacher_id',$da['teacher_id'])->get();
					$a = explode('，',$da['teach_feature']);
					$b = explode('，',$da['teach_subject']);
					$c = explode('，',$da['teach_grade']);
					$d = explode('，',$da['teach_county']);
					$e = explode('，',$da['region']);
					$f = explode('，',$da['teach_schedule']);
        //echo json_encode($a,320);
					$da['teach_feature'] = $a;
					$da['teach_subject'] = $b;
					$da['teach_grade'] = $c;
					$da['teach_county'] = $d;
					$da['region'] = $e;
					$da['teach_schedule'] = $f;
					array_push($message['data'], $da);

				}

			}
    	}

    	$message['status_code'] = 200;
		echo json_encode($message);


    }



}
