<?php

use App\Http\Controllers\admin\KelasContrroller;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\WaliController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\nadzom\NadzomController;
use App\Models\Nilai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\DashboarController;
use App\Http\Controllers\admin\SantriController;
use App\Http\Controllers\quran\QuranController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {

    Route::get('/', [LoginController::class, 'index']);
    Route::post('/masuk', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register/akun', [RegisterController::class, 'store']);
});

Route::middleware('admin')->group(function () {

    Route::get('/admin', [DashboarController::class, 'index']);

    // buat akun
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/create', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::post('/user/delete/{id}', [UserController::class, 'destroy']);



    // buat akun wali santri

    Route::get('/akun-wali', [WaliController::class, 'index']);
    Route::post('/akun-wali/create', [WaliController::class, 'store']);
    Route::post('/akun-wali/edit/{id}', [WaliController::class, 'edit']);
    Route::post('/akun-wali/delete/{id}', [WaliController::class, 'destroy']);





    //kelas
    Route::get('/kelas', [KelasContrroller::class, 'index']);
    Route::post('/kelas/add', [KelasContrroller::class, 'store']);
    Route::post('/kelas/edit/{id}', [KelasContrroller::class, 'update']);
    Route::post('/kelas/hapus/{id}', [KelasContrroller::class, 'destroy']);




    //samtri
    Route::get('/santri', [SantriController::class, 'index']);
    Route::post('/santri/create', [SantriController::class, 'store']);
    Route::post('/santri/update/{id}', [SantriController::class, 'store']);
    Route::post('/santri/delete/{id}', [SantriController::class, 'destroy']);




});



Route::middleware(['auth', 'nadzom'])->group(function () {

    Route::get('/nadzom', [NadzomController::class, 'index']);
    Route::get('/nilai', [NadzomController::class, 'nilai']);

    // input Nilai
    Route::post('/input/nilai/{id}', [NadzomController::class, 'penilaian']);



});


Route::middleware(['auth', 'quran'])->group(function () {

    Route::get('/quran', [QuranController::class, 'index']);

    Route::get('/nilai-santri', [QuranController::class, 'nilai']);
    Route::post('/nilai-santri/update/{id}', [QuranController::class, 'skor']);


});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});
