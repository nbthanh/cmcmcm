<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct(){
        
    }

    public function auth_login(Request $request){
    	if (Auth::check()) {
    		return redirect()->route('admin.dashboard');
    	}

    	if ($request->post()) {
    		$data = $request->all();
            $validator = Validator::make($data, [
                'txtUsername' => 'required|min:3|max:255',
                'txtPassword' => 'required|min:8'
            ],
            [
                'txtUsername.required' => 'Vui lòng nhập user name',
                'txtUsername.min'      => 'User name tối thiểu 3 ký tự',
                'txtUsername.max'      => 'User name tối đa 255 ký tự',
                'txtPassword.required' => 'Vui lòng nhập password',
                'txtPassword.min'      => 'Password tối thiểu có 8 ký tự',
            ]);

            if (!empty($validator) && $validator->fails()) {
                return back()->withErrors($validator);
            }else {
                $credentials = [
                    'user_name' => $data['txtUsername'],
                    'password' => $data['txtPassword']
                ];
                if (Auth::attempt($credentials)) {
                    if (Auth::user()->user_status == 1) {
                        return redirect()->route('admin.dashboard');
                    }else {
                        Auth::logout();
                        return back()->with([
                            'message_type'  => 'danger',
                            'flash_message' => 'Không phải BQT mà vào đây làm gì bạn ???'
                        ]);
                    }
                }else {
                    return back()->with([
                        'message_type'  => 'danger',
                        'flash_message' => 'User Name Hoặc Password Không đúng rồi'
                    ]);
                }
            }
        }
		return view('backend.auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }
}
