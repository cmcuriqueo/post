<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\MicroPost;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	if(Auth::check())
			return redirect('/home');
    	else
        	return view('welcome', ['microposts' => MicroPost::all()]);
    }
}
