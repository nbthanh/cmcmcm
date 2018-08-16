<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct(){

    }

    public function auth_login(Request $request){
    	if (Auth::guard()->check()) {
    		# code...
    	}

    	if ($request->post()) {
    		echo 'post';
    	}
		return view('backend.auth.login');
    }
}
