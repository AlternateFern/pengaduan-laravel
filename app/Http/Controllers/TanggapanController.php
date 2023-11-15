<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    function updateTanggapan(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'status' => 'required|in:proses,selesai',
            'tanggapan' => 'required|string',
            'id_pengaduan' => 'required|exists:pengaduan,id_pengaduan',
        ]);

        
        // Update the status in the 'pengaduan' table
        Pengaduan::where('id_pengaduan', $validatedData['id_pengaduan'])
            ->update(['status' => $validatedData['status']]);



        $tanggapan = new Tanggapan([
            'id_pengaduan' => $validatedData['id_pengaduan'],
            'tgl_pembuatan' => now(),
            'isi_tanggapan' => $validatedData['tanggapan'],
        ]);
        
        if (Auth::guard('petugas')->check()) {
            $tanggapan->id_petugas = Auth::guard('petugas')->id();
        }
        
        $tanggapan->save();

        return redirect()->back();
    }

    function viewTanggapan($id){
        // var_dump(Auth::guard('petugas')->id());
        // $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        // return view('petugas/tanggapan_pengaduan_petugas', ['pengaduan' => $pengaduan]);
        $pengaduan = Pengaduan::find($id);
        $existingResponse = $pengaduan->tanggapan;
        $petugas = Auth::guard('petugas')->user();
        // $existingResponse = Tanggapan::where('id_pengaduan', $id)
        // ->where('id_petugas', Auth::id())
        // ->exists();

        return view('petugas/tanggapan_pengaduan_petugas', [
            'pengaduan' => $pengaduan,
            'existingResponse' => $existingResponse,
            'petugas' => $petugas,
        ]); 
    }
}
