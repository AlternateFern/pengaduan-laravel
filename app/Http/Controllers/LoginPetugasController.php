<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPetugasController extends Controller
{
    public function index(){
        return view('petugas/login_petugas'); // file name
    }
}
