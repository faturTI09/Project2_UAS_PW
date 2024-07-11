<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\Unit_KerjaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/pasien', [PasienController::class, 'index']);
Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
Route::get('/pasien/detail/{id}', [PasienController::class, 'show'])->name('pasien.show');
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
Route::post('/pasien/update/{id}', [PasienController::class, 'update'])->name('pasien.update');

Route::get('/periksa', [PeriksaController::class, 'index']);
Route::post('/periksa/store', [PeriksaController::class, 'store'])->name('periksa.store');
Route::delete('/periksa/{id}', [PeriksaController::class, 'destroy'])->name('periksa.destroy');
Route::get('/periksa/detail/{id}', [PeriksaController::class, 'show'])->name('periksa.show');
Route::get('/periksa/edit/{id}', [PeriksaController::class, 'edit'])->name('periksa.edit');
Route::post('/periksa/update/{id}', [PeriksaController::class, 'update'])->name('periksa.update');


Route::get('/kelurahan', [KelurahanController::class, 'index']);
Route::post('/kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store');
Route::delete('/kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.destroy');
Route::get('/kelurahan/detail/{id}', [KelurahanController::class, 'show'])->name('kelurahan.show');
Route::get('/kelurahan/edit/{id}', [KelurahanController::class, 'edit'])->name('kelurahan.edit');
Route::post('/kelurahan/update/{id}', [KelurahanController::class, 'update'])->name('kelurahan.update');


Route::get('/dokter', [DokterController::class, 'index']);
Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');
Route::get('/dokter/detail/{id}', [DokterController::class, 'show'])->name('dokter.show');
Route::get('/dokter/edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
Route::post('/dokter/update/{id}', [DokterController::class, 'update'])->name('dokter.update');

Route::get('/unit_kerja', [Unit_KerjaController::class, 'index']);
Route::post('/unit_kerja/store', [Unit_KerjaController::class, 'store'])->name('unit_kerja.store');
Route::get('unit_kerja/{id}/edit', [Unit_KerjaController::class, 'edit'])->name('unit_kerja.edit');
Route::get('/unit_kerja/detail/{id}', [Unit_KerjaController::class, 'show'])->name('unit_kerja.show');
Route::put('unit_kerja/{id}', [Unit_KerjaController::class, 'update'])->name('unit_kerja.update');
Route::delete('/unit_kerja/{id}', [Unit_KerjaController::class, 'destroy'])->name('unit_kerja.destroy');



