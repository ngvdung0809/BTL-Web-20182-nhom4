<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends HomeController
{

    //
    public function check(Request $request){ 
        $user=[
            'username'=>$request->username,
            'password'=>$request->password,
            'role'=>'0',

        ];

        $admin=[
            'username'=>$request->username,
            'password'=>$request->password,
            'role'=>'1'

        ];


        if(Auth::attempt($user)){
            return redirect()->route('home_index')->with('success', 'Đăng nhập thành công');
            
        }
        elseif (Auth::attempt($admin)) {
            # code...
            return redirect()->route('admin_index')->with('success', 'Đăng nhập thành công');
        }
        else{ 
            return redirect()->back()->with('error', 'Thông tin tài khoản hoặc mật khẩu không chính xác');
        }

    }

}
