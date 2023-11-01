<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class UpdateStatusController extends Controller
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

    function viewStatus($id){
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        return view('petugas/update_status', ['pengaduan' => $pengaduan]);
    }
}
