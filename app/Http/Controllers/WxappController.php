<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wxApp;

class WxappController extends Controller
{
    //
    public function showMentors(){
    	$wxMessage = wxApp::all();
    	echo json_encode($wxMessage);
    }
    
}
