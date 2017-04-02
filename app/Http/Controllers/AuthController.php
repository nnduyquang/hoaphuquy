<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|max:50',
            'password'=>'required'
        ]);
        $email=$request['email'];
        $password=$request['password'];
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect('sml_admin/dashboard');
        }else{
            $errors = new MessageBag(['errors' => ['Thông Tin Đăng Nhập Không Hợp Lệ.']]);
            return Redirect::back()->withErrors($errors);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('sml_login');
    }
}
