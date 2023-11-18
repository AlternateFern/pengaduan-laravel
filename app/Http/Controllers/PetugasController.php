<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
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
        // $adminId = Auth::guard('petugas')->id();
        // var_dump($adminId);
        $pengaduan = Pengaduan::all();

        return view('petugas/home_petugas', ["pengaduan" => $pengaduan]);
    }

    public function uploadFotoprofil(Request $request){
        $request->validate([
            'foto_profil' => 'required|image|mimes:png,jpg,jpeg|max:15000|dimensions:max_width=1000,max_height=1000',
        ]);
        
        $petugas = auth()->guard('petugas')->user();

        // Delete existing profile picture (if any)
        if ($petugas->foto_profil) {
            Storage::delete($petugas->foto_profil);
        }

        // Store new profile picture
        $path = $request->file('foto_profil')->store('fotoprofil', 'public'); // fotoprofil = nama folder
        $petugas->foto_profil = $path;
        $petugas->save();

        return redirect()->back()->with('success', 'Profile picture uploaded successfully.');
    }

    public function viewProfil()
    {
        $petugas = auth()->guard('petugas')->user();
        return view('petugas.profil_petugas', compact('petugas'));
    }
}
