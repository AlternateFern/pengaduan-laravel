<?php
// isi
namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengaduanController extends Controller
{
    function viewHome()
    {
        // Elloquent ORM
        $pengaduan = Pengaduan::where('nik', Auth::user()->nik)->get();

        return view('/home', ["pengaduan" => $pengaduan]);
    }

    function detailpengaduan($id){
        // $pengaduan = DB::table('pengaduan')-> get();
        // $title = "titel";

        // return view('/detail',['pengaduan'=>$pengaduan]);
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan','=',$id)->get();
    
        return view('/detail_pengaduan',['pengaduan'=> $pengaduan]);
    }

    function detailpengaduanpetugas($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->get();
        return view('petugas/detail_pengaduan_petugas', ['pengaduan' => $pengaduan]);
    }

    function viewBuatlaporan()
    {
        return view('isi_pengaduan');
    }

    function proses_tambah_pengaduan(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required|min:5'
        ]);

        $nama_foto = $request->foto->getClientOriginalName();

        $request->foto->storeAs('public/image', $nama_foto);

        $isi_pengaduan = $request->isi_laporan;

        Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d'),
            'nik' => Auth::user()->nik,
            'isi_laporan' => $isi_pengaduan,
            'foto' => $request->foto->getClientOriginalName(),
            'status' => '0'
        ]);

        return redirect('/home');
    }

    function hapus($id)
    {
        // DB::table('pengaduan')->where('id_pengaduan','=',$id)->delete();
        Pengaduan::where('id_pengaduan', '=', $id)->delete();
        return redirect()->back();
    }

    function proses_update(Request $request, $id)
    {
        $request->validate([
            'isi_laporan' => 'required|min:3'
        ]);

        $isi_laporan = $request->isi_laporan;

        // DB::table('pengaduan')->where('id_pengaduan',$id) -> update([
        Pengaduan::where('id_pengaduan', $id)->update([
            'isi_laporan' => $isi_laporan,
        ]);
        return redirect('/home');
    }

    function update($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        return view('update_pengaduan', ['pengaduan' => $pengaduan]);
    }
}
