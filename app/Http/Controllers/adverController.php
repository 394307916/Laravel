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

    
}
