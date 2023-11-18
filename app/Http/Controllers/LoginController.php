<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){
        $dataLogin = $request->only("username", "password");
        if(Auth::attempt($dataLogin)){
            return redirect('/home');
        }else{
            return redirect('/login')->with("error", "Username atau Password Salah");
        }
    }

    function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
