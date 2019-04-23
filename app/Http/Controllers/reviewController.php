<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alluser;
use App\NewInfo;
use App\Review;

class reviewController extends Controller
{
    public function getReview(Request $request){

    	$text = $request->input('text');
    	$new_id = $request->input('new_id');
    	$user_openid = $request->input('openid');

    	$review = new Review();

    	$review->text = $text;
    	$review->new_id = $new_id;
    	$review->user_openid = $user_openid;

    	$newinfo = NewInfo::find($new_id);
    	$review->new_openid = $newinfo->openid;

    	$alluser = Alluser::find($user_openid);
    	$review->name = $alluser->nickName;
    	$review->user_img = $alluser->avatarUrl;

    	$review->is_read = 0;
    	$review->redPoint = 0;

    	$review->save();

    	$message = [];
    	$message['status_code'] = 200;
    	echo json_encode($message);
    }

    public function messageReview(Request $request){
    	$openid = $request->input('openid');

    	$liuyan = Review::where('new_openid',$openid)->orderBy('created_at','desc')->get();

    	foreach ($liuyan as $da) {

    		if($da->is_read == 0){
    			$da->redPoint = 1;
    		}

    		if($da->is_read == 1){
    			$da->redPoint = 0;
    		}

    		$da->is_read = 1;
    		$da->save();
    
    	}


		$message = [];
    	$message['status_code'] = 200;
    	$message = $liuyan;
    	echo json_encode($message);
    }

    public function hasNewReview(Request $request){
    	$openid = $request->input('openid');

    	$liuyan = Review::where('new_openid',$openid)->get();

    	$message = [];

    	foreach ($liuyan as $da) {

    		if($da->is_read == 0){
    			$message['hasNewReview'] = 1;
    		}else{
    			$message['hasNewReview'] = 0;
    		}
    
    	}

    	$message['status_code'] = 200;
    	echo json_encode($message);
    }

    
}
