<?php

use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/register', [RegisterController::class, 'viewRegister']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'viewLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/petugas/', [PetugasController::class, 'viewLogin']);
Route::post('/petugas/', [PetugasController::class, 'login']);

Route::middleware(['checkpetugas'])->group(function () {
    Route::get('/petugas/home', [PetugasController::class, 'viewHome']);
    Route::get('/petugas/list_masyarakat', [PetugasController::class, 'viewListmasyarakat']);
    Route::get('/petugas/logout', [PetugasController::class, 'logout']);
    Route::get('/petugas/detail_pengaduan/{id}', [PengaduanController::class, 'detailpengaduanpetugas']);
    Route::get('/petugas/tanggapan_pengaduan/{id}', [TanggapanController::class, 'viewTanggapan']);
    Route::post('/petugas/tanggapan_pengaduan/{id}', [TanggapanController::class, 'updateTanggapan'])->name('petugas.tanggapan-form');
    Route::post('/petugas/hapus_pengaduan/{id}', [TanggapanController::class, 'hapusPengaduan']);
    Route::get('/petugas/profil', [PetugasController::class, 'viewProfil']);
    Route::post('/petugas/upload-profile-picture', [PetugasController::class, 'uploadFotoprofil'])->name('petugas.uploadFotoprofil');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PengaduanController::class, 'viewHome']);
    Route::get('/detail_pengaduan/{id}', [PengaduanController::class, 'detailPengaduan']);
    Route::get('/isi_pengaduan', [PengaduanController::class, 'viewBuatlaporan']);
    Route::post('/isi_pengaduan', [PengaduanController::class, 'proses_tambah_pengaduan']);
    Route::get('/hapus_pengaduan/{id}', [PengaduanController::class,'hapus']);
    Route::get ('/update_pengaduan/{id}', [PengaduanController::class,'update']);
    Route::post('/update_pengaduan/{id}', [PengaduanController::class,'proses_update']);
});


