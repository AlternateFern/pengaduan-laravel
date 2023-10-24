<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function viewregister(){
        return view('petugas/register_petugas'); // file name
    }

    function register(Request $request){
        // var_dump($request->all());

        $data = DB::table("petugas")->insert([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => $request->level,
        ]);

        return redirect('/petugas');
    }

    public function viewlogin(){
        // return Hash::make("123");
        return view('petugas/login_petugas'); // file name
    }

    function login(Request $request){
        $data = $request->only('username', 'password');
        if(Auth::guard("petugas")->attempt($data)){
            return redirect('/petugas/home');
        }else{
            return redirect('/petugas')->with("error", "Username atau Password Salah");
        }
    }

    function logout(){
        Auth::guard("petugas")->logout();

        return redirect("/petugas");
    }

    public function home(){
        $pengaduan = Pengaduan::all();

        return view('petugas/home_petugas', ["pengaduan" => $pengaduan]);
    }
}
