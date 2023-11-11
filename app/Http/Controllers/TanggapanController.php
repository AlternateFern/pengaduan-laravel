<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    function updateTanggapan(Request $request, $id)
    {
        $customErrorMessages = [
            'id_pengaduan.exists' => 'The selected report does not exist.',
        ];
        
        try {
        $validatedData = $request->validate([
            'status' => 'required|in:proses,selesai',
            'tanggapan' => 'required|string',
            'id_pengaduan' => 'required|exists:pengaduan,id_pengaduan',
        ], $customErrorMessages);
    } catch (QueryException $e) {
        // Check if the exception message contains a specific string indicating a duplicate entry
        if (str_contains($e->getMessage(), 'Duplicate entry')) {
            return redirect()->back()->withErrors(['custom_error' => 'You have already submitted a response for this report.']);
        } else {
            // If it's a different SQL error, rethrow the exception
            throw $e;
        }
    }

        
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
        return view('petugas/tanggapan_pengaduan_petugas', ['pengaduan' => $pengaduan]);
    }
}
