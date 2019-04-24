<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad_img;
use App\Ad_text;

class adverController extends Controller
{
    public function getAdImg(Request $request){

    	$img = $request->input('img');

    	$ad_img = new Ad_img();

    	$ad_img->img = $img;

    	$ad_img->save();

    	return json_encode("okokok");
    }

    public function getAdText(Request $request){

    	$text = $request->input('text');

    	$ad_text = new Ad_text();

    	$ad_text->text = $text;

    	$ad_text->save();

    	return json_encode("okokok");
    }

    public function showAdImg(){

    	$ad_img = Ad_img::all();

    	$message = [];
    	$message['data'] = $ad_img;

    	return json_encode($message);

    }

    public function showAdText(){

    	$ad_text = Ad_text::all();

    	$message = [];
    	$message['data'] = $ad_text;

    	return json_encode($message);
    	
    }
}
