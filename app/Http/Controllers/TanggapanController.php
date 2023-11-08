<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;


class TanggapanController extends Controller
{
    function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:proses,selesai'
        ]);

        $status = $request->status;

        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => $status,
        ]);
        return redirect('/petugas/home');
    }

    function viewTanggapan($id){
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        return view('petugas/tanggapan_pengaduan_petugas', ['pengaduan' => $pengaduan]);
    }
}
