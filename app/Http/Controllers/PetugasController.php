<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function viewLogin()
    {
        // return Hash::make("123");
        return view('petugas/login_petugas'); // file name
    }

    function login(Request $request)
    {
        $data = $request->only('username', 'password');
        if (Auth::guard("petugas")->attempt($data)) {
            return redirect('/petugas/home');
        } else {
            return redirect('/petugas')->with("error", "Username atau Password Salah");
        }
    }

    function logout()
    {
        Auth::guard("petugas")->logout();
        return redirect("/petugas");
    }

    public function viewHome()
    {
        // $adminId = Auth::guard('petugas')->id();
        // var_dump($adminId);
        $pengaduan = Pengaduan::all();
        $petugas = Auth::guard('petugas')->user();
        // $petugas = Auth::guard('petugas')->user();
        return view('petugas/home_petugas', compact('pengaduan','petugas'));
    }

    public function viewLoginAdmin()
    {
        // return Hash::make("123");
        return view('admin/login_admin'); // file name
    }

    function loginAdmin(Request $request)
    {
        $data = $request->only('username', 'password');
        if (Auth::guard("admin")->attempt($data)) {
            return redirect('/admin/home');
        } else {
            return redirect('/admin')->with("error", "Username atau Password Salah");
        }
    }

    function logoutAdmin()
    {
        Auth::guard("admin")->logout();
        return redirect("/admin");
    }

    public function viewHomeAdmin()
    {
        $pengaduan = Pengaduan::all();
        $petugas = Auth::guard('petugas')->user();
        return view('admin/home_admin', compact('pengaduan','petugas'));
    }
    

    public function viewListmasyarakat()
    {
        $masyarakat = User::all();

        return view('petugas/list_masyarakat', compact('masyarakat'));
    }

    public function uploadFotoprofil(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:png,jpg,jpeg|max:15000|dimensions:max_width=1000,max_height=1000',
        ]);
        
        $petugas = auth()->guard('petugas')->user();

        if ($petugas->foto_profil) {
            Storage::delete($petugas->foto_profil);
        }

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
