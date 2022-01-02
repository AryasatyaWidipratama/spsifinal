<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HonorController;
use App\Http\Controllers\JadwalsidangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // MAHASISWA
    Route::get('/dashboard/jadwal-sidang-mahasiswa', [JadwalsidangController::class, 'jadwalSidangMahasiswa'])->name('jadwal-sidang.mahasiswa');
    Route::resource('dashboard/laporan', LaporanController::class);

    // DOSEN
    Route::get('/dashboard/jadwal-sidang-dosen', [JadwalsidangController::class, 'jadwalSidangDosen'])->name('jadwal-sidang.dosen');
    Route::get('/dashboard/honor-dosen', [HonorController::class, 'honorDosen'])->name('honor.dosen');

    // PAA
    Route::get('/dashboard/honor-belum-diajukan', [HonorController::class, 'honorBelumDiajukan'])->name('honor.belum-diajukan');
    Route::resource('/dashboard/honor', HonorController::class);
    Route::resource('/dashboard/jadwal-sidang', JadwalsidangController::class);
});
