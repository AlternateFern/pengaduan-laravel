<?php

use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UpdateStatusController;
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


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/petugas/', [PetugasController::class, 'viewlogin']);
Route::post('/petugas/', [PetugasController::class, 'login']);
Route::get('/petugas/register', [PetugasController::class, 'viewregister']);
Route::post('/petugas/register', [PetugasController::class, 'register']);

Route::middleware(['checkpetugas'])->group(function () {
    Route::get('/petugas/home', [PetugasController::class, 'home']);
    Route::get('/petugas/logout', [PetugasController::class, 'logout']);
    Route::get('/petugas/detail_pengaduan/{id}', [pengaduanController::class, 'detailpengaduanpetugas']);
    Route::get('/petugas/update_status/{id}', [UpdateStatusController::class, 'viewStatus']);
    Route::post('/petugas/update_status/{id}', [UpdateStatusController::class, 'updateStatus']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [pengaduanController::class, 'index']);
    Route::get('/detail_pengaduan/{id}', [pengaduanController::class, 'detailpengaduan']);
    Route::get('/isi_pengaduan', [pengaduanController::class, 'isi_pengaduan']);
    Route::post('/isi_pengaduan', [pengaduanController::class, 'proses_tambah_pengaduan']);
    Route::get('/hapus_pengaduan/{id}', [pengaduanController::class,'hapus']);
    Route::get ('/update_pengaduan/{id}', [pengaduanController::class,'update']);
    Route::post('/update_pengaduan/{id}', [pengaduanController::class,'proses_update']);
});


