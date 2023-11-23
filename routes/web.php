<?php

use App\Http\Controllers\PengaduanController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/registration/create', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('registration.create');
Route::resource('pengaduan', PengaduanController::class);
Route::resource('tanggapan', TanggapanController::class);
Route::resource('user', App\Http\Controllers\UserController::class);
Route::get('/laporan', [App\Http\Controllers\PengaduanController::class, 'laporan'])->middleware('auth');
Route::get('/laporan/cetak', [App\Http\Controllers\PengaduanController::class, 'pdf'])->middleware('auth');