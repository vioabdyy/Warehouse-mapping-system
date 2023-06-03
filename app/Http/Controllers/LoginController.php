<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view ('login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('name','password'))){
            return redirect('dashboard');
        }
        return redirect('/');
    }

    public function logout(Request $request){
       Auth::logout();
       return redirect('/');
    }
}
