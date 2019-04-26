<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest',[
			'only' => ['create']
		]);

		$this->middleware('auth',[
			'except' => ['create','store']
		]);
	}

    public function create()
    {
    	return view('sessions.create');
    }

    public function home()
    {
    	return view('sessions.home');
    }

    public function store(Request $request)
    {
    	$credentials = $this->validate($request,[
    		'email' => 'required|email|max:255',
    		'password' => 'required'
    	]);

    	if(Auth::attempt($credentials)){
    		session()->flash('success','帅哥你来了');
    		return redirect()->intended(route('myadmin',[Auth::user()]));
            //return view('session.home',[Auth::user()]);
    	}else{
    		session()->flash('danger','不知道哪里出错了');
    		return redirect()->back();
    	}
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已成功退出！');
        return redirect('xlogin');
    }
}
