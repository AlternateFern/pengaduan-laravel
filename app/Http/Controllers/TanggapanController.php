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



        // Create a new response in the 'tanggapan' table
        Tanggapan::create([
            'id_pengaduan' => $validatedData['id_pengaduan'],
            'tgl_pembuatan' => now(),
            'tanggapan' => $validatedData['tanggapan'],
            'id_petugas' => Auth::id(),
        ]);

        return redirect()->back();
    }

    function viewTanggapan($id){
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        // return view('petugas/tanggapan_pengaduan_petugas', ['pengaduan' => $pengaduan]);
        // $pengaduan = Pengaduan::find($id);
        

        $existingResponse = Tanggapan::where('id_pengaduan', $id)
        ->where('id_petugas', Auth::id())
        ->exists();

        return view('petugas/tanggapan_pengaduan_petugas', compact('pengaduan','existingResponse')); 
    }
}
