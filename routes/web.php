<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserManagementController;

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
Route::get('/reg', [LoginController::class, 'reg'])->name('reg');
Route::post('/regisProses', [LoginController::class, 'regisProses'])->name('regisProses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::view('invoices', 'pembayaran.invoice');

// Route::group(['middleware' => 'prev'], function(){
    // route to dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => ['auth', 'cekLevel:Admin']], function(){
        // route spp
        Route::resource('spp', SPPController::class);
        // route kelas
        Route::resource('kelas', KelasController::class);
        // route siswa
        Route::resource('siswa', SiswaController::class);
        // route user management
        Route::get('/userManagement', [UserManagementController::class, 'index'])->name('userManagement');
            // admin
            Route::get('/regIndexAdmin', [UserManagementController::class, 'regIndexAdmin'])->name('regIndexAdmin');
            Route::get('/regAdmin', [UserManagementController::class, 'regAdmin'])->name('regAdmin');
            Route::post('/regAdmin', [UserManagementController::class, 'regAdminProses'])->name('regAdmin');
            Route::get('/regAdmin/{id}/edit', [UserManagementController::class, 'regAdminEdit'])->name('regAdmin');
            Route::put('/regAdmin/{id}', [UserManagementController::class, 'regAdminProsesEdit'])->name('regAdmin.update');
            Route::delete('/regAdmin/{id}', [UserManagementController::class, 'regDestroyAdmin'])->name('regAdmin.destroy');
            // petugas
            Route::get('/regIndexPet', [UserManagementController::class, 'regIndexPet'])->name('regIndexPet');
            Route::get('/regPet', [UserManagementController::class, 'regPet'])->name('regPet');
            Route::post('/regPet', [UserManagementController::class, 'regPetProses'])->name('regPet');
            Route::get('/regPet/{id}/edit', [UserManagementController::class, 'regPetEdit'])->name('regPet');
            Route::put('/regPet/{id}', [UserManagementController::class, 'regPetProsesEdit'])->name('regPet.update');
            Route::delete('/regPet/{id}', [UserManagementController::class, 'regDestroyPet'])->name('regPet.destroy');
            // siswa
            Route::get('/regIndexSis', [UserManagementController::class, 'regIndexSis'])->name('regIndexSis');
            Route::get('/regSis', [UserManagementController::class, 'regSis'])->name('regSis');
            Route::post('/regSis', [UserManagementController::class, 'regSisProses'])->name('regSis');
            Route::get('/regSis/{id}/edit', [UserManagementController::class, 'regSisEdit'])->name('regSis');
            Route::put('/regSis/{id}', [UserManagementController::class, 'regSisProsesEdit'])->name('regSis.update');
            Route::delete('/regSis/{id}', [UserManagementController::class, 'regDestroyPet'])->name('regSis.destroy');

            Route::get('/sppPDF', [SPPController::class, 'pdf'])->name('sppPDF');
            Route::get('/kelasPDF', [KelasController::class, 'pdf'])->name('kelasPDF');
            Route::get('/siswaPDF', [SiswaController::class, 'pdf'])->name('siswaPDF');
        });

    Route::middleware(['cekPay'])->group(function() {
        Route::get('/invoice/{id}', [PembayaranController::class, 'show'])->name('invoice');
        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
        Route::get('/bayaran/{id}', [PembayaranController::class, 'create'])->name('bayaran');
        Route::delete('/byrDel/{id}', [PembayaranController::class, 'destroy'])->name('byrDel');
        Route::post('/pay', [PembayaranController::class, 'pay'])->name('pay');
    });

    Route::group(['middleware' => ['auth', 'cekLevel:Siswa']], function(){
        Route::get('/history', [SiswaController::class, 'history'])->name('history');
    });
// });
