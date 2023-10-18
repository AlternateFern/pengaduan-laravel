<?php

use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
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


Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Route::get('/home', function () {
//     return view('home');
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [pengaduanController::class, 'index']);
});

Route::get('/detail_pengaduan/{id}', [pengaduanController::class, 'detailpengaduan']);
Route::get('/isi_pengaduan', [pengaduanController::class, 'isi_pengaduan']);
Route::post('/isi_pengaduan', [pengaduanController::class, 'proses_tambah_pengaduan']);
Route::get('/hapus_pengaduan/{id}', [pengaduanController::class,'hapus']);
Route::get ('/update_pengaduan/{id}', [pengaduanController::class,'update']);
Route::post('/update_pengaduan/{id}', [pengaduanController::class,'proses_update']);
