<?php

namespace App\Http\Controllers;

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
        return view('welcome', ['microposts' => MicroPost::all()]);
    }
}
