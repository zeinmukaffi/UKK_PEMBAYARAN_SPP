<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

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

Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/loginProses', [LoginController::class, 'loginProses'])->name('loginProses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['preventBack']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('spp', SPPController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
});
