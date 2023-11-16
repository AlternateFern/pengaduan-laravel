<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index()
    {
        return view('register');
    }

    function register(Request $request)
    {
        // var_dump($request->all());
        $validate = $request->validate([
            'nik' => 'required|unique:masyarakat',
            'nama' => 'required|string',
            'username' => 'required|unique:masyarakat',
            'password' => 'required|min:6',
            'telp' => 'required|numeric',
        ]);

        $dataRegister = DB::table("masyarakat")->insert([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp
        ]);

        if (!$dataRegister) {
            return redirect()->back()->with('error', 'Registerasi Gagal.');
        }

        // Continue with the success flow
        return redirect()->route('success')->with('success', 'Registration successful.');
        return redirect('/login');
    }
}
