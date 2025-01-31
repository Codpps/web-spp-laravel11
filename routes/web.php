<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\HistoryPembayaranController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.petugas.index');
});

Route::resource('petugas', PetugasController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('kelas', KelasController::class);
Route::resource('spp', SppController::class);
Route::resource('pembayaran', PembayaranController::class);

Route::get('/history-pembayaran', [HistoryPembayaranController::class, 'index'])->name('history.pembayaran');
