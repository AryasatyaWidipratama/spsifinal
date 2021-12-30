<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserController;

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

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', function () {
    return view('home');
});


Route::get('kecamatan',[KecamatanController::class,'kecamatan']);
Route::get('kecamatan/tambah',[KecamatanController::class,'tambah']);
Route::post('kecamatan/store',[KecamatanController::class,'store']);
Route::get('kecamatanedit/{id}',[KecamatanController::class,'edit']);
Route::post('kecamatan/update',[KecamatanController::class,'update']);
Route::get('kecamatan/delete/{id}',[KecamatanController::class,'delete']);

Route::get('bencana',[BencanaController::class,'bencana']);
Route::get('bencana/tambah',[BencanaController::class,'tambah']);
Route::post('bencana/store',[BencanaController::class,'store']);
Route::get('bencanaedit/{id}',[BencanaController::class,'edit']);
Route::post('bencana/update',[BencanaController::class,'update']);
Route::get('bencana/delete/{id}',[BencanaController::class,'delete']);

Route::get('kategori',[KategoriController::class,'kategori']);
Route::get('kategori/tambahkategori',[KategoriController::class,'tambah']);
Route::post('kategori/store',[KategoriController::class,'store']);
Route::get('kategoriedit/{id}',[KategoriController::class,'edit']);
Route::post('kategori/update',[KategoriController::class,'update']);
Route::get('kategori/delete/{id}',[KategoriController::class,'delete']);

Route::get('kota',[KotaController::class,'kota']);
Route::get('kota/tambahkota',[KotaController::class,'tambah']);
Route::post('kota/store',[KotaController::class,'store']);
Route::get('kotaedit/{id}',[KotaController::class,'edit']);
Route::post('kota/update',[KotaController::class,'update']);
Route::get('kota/delete/{id}',[KotaController::class,'delete']);

Route::get('detail',[DetailController::class,'detail']);
Route::get('detail/tambah',[DetailController::class,'tambah']);
Route::post('detail/store',[DetailController::class,'store']);
Route::get('detailedit/{id}',[DetailController::class,'edit']);
Route::post('detail/update',[DetailController::class,'update']);
Route::delete('detail/delete/{id}',[DetailController::class,'delete']);

Route::get('pelaporan',[PelaporanController::class,'pelaporan']);
Route::get('pelaporan/tambah',[PelaporanController::class,'tambah']);
Route::post('pelaporan/store',[PelaporanController::class,'store']);
Route::get('pelaporanedit/{id}',[PelaporanController::class,'edit']);
Route::post('pelaporan/update',[PelaporanController::class,'update']);
Route::delete('pelaporan/delete/{id}',[PelaporanController::class,'delete']);


Route::get('provinsi',[ProvinsiController::class,'provinsi']);
Route::get('provinsi/tambahprov',[ProvinsiController::class,'tambah']);
Route::post('provinsi/store',[ProvinsiController::class,'store']);
Route::get('provinsiedit/{id}',[ProvinsiController::class,'edit']);
Route::post('provinsi/update',[ProvinsiController::class,'update']);
Route::get('provinsi/delete/{id}',[ProvinsiController::class,'delete']);

Route::get('role',[RoleController::class,'role']);
Route::get('role/tambahrole',[RoleController::class,'tambah']);
Route::post('role/store',[RoleController::class,'store']);
Route::get('roleedit/{id}',[RoleController::class,'edit']);
Route::post('role/update',[RoleController::class,'update']);
Route::get('role/delete/{id}',[RoleController::class,'delete']);

//Route::get('user role',[UserroleController::class,'usrrole']);

Route::get('user',[UserController::class,'user']);
Route::get('user/tambahuser',[UserController::class,'useradd']);
Route::post('user/store',[UserController::class,'userstore']);
Route::get('useredit/{id}',[UserController::class,'edit']);
Route::post('user/update',[UserController::class,'update']);
Route::get('user/delete/{id}',[UserController::class,'delete']);

Route::get('/login', function () {
    return view('login', [
        "title" => "Login"
    ]);
});

Route::get('/register', function () {
    return view('register', [
        "title" => "register"
    ]);
});

Route::get('/forgot-password', function () {
    return view('forgot-password', [
        "title" => "lupa-password"
    ]); 
});

Route::get('/dbbaru', function () {
    return view('layout.dashboard', [
    ]);
});

Route::get('/disport', function () {
    return view('layout.landingpage', [
        "title" => "Homepage"
    ]);
});

// Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'authenticate']);
// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/forgot-password', function () {
//     return view('forgot-password', [
//         "title" => "lupa-password"
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/forgot-password', function () {
    return view('forgot-password', [
        "title" => "lupa-password"
    ]);
   
});

Route::get('/login', function () {
    return view('login');
});
 Route::post('/proseslogin', [lojincontroller::class, 'authenticate']);
Route::get('/dashboard', function () {
    return view('layout.dashboard');
});