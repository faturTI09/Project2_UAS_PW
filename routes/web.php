<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MontirController;
use App\Http\Controllers\Kategori_MontirController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Detail_LayananController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomee');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/layanan/index', [LayananController::class, 'index']);
Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store')->middleware('admin');
Route::delete('/layanan/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy')->middleware('admin');
Route::get('/layanan/detail/{id}', [LayananController::class, 'show'])->name('layanan.show')->middleware('admin');
Route::get('/layanan/edit/{id}', [LayananController::class, 'edit'])->name('layanan.edit')->middleware('admin');
Route::post('/layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update')->middleware('admin');

Route::get('/detail_layanan/index', [Detail_LayananController::class, 'index']);
Route::post('/detail_layanan/store', [Detail_LayananController::class, 'store'])->name('detail_layanan.store')->middleware('admin');
Route::delete('/detail_layanan/destroy/{id}', [Detail_LayananController::class, 'destroy'])->name('detail_layanan.destroy')->middleware('admin');
Route::get('/detail_layanan/detail/{id}', [Detail_LayananController::class, 'show'])->name('detail_layanan.show')->middleware('admin');
Route::get('/detail_layanan/edit/{id}', [Detail_LayananController::class, 'edit'])->name('detail_layanan.edit')->middleware('admin');
Route::post('/detail_layanan/update/{id}', [Detail_LayananController::class, 'update'])->name('detail_layanan.update')->middleware('admin');

Route::get('/montir/index', [MontirController::class, 'index']);
Route::post('/montir/store', [MontirController::class, 'store'])->name('montir.store');
Route::delete('/montir/destroy/{id}', [MontirController::class, 'destroy'])->name('montir.destroy');
Route::get('/montir/detail/{id}', [MontirController::class, 'show'])->name('montir.show');
Route::get('/montir/edit/{id}', [MontirController::class, 'edit'])->name('montir.edit');
Route::post('/montir/update/{id}', [MontirController::class, 'update'])->name('montir.update');

Route::get('/kategori_montir/index', [Kategori_MontirController::class, 'index']);
Route::post('/kategori_montir/store', [Kategori_MontirController::class, 'store'])->name('kategori_montir.store');
Route::delete('/kategori_montir/destroy/{id}', [Kategori_MontirController::class, 'destroy'])->name('kategori_montir.destroy');
Route::get('/kategori_montir/detail/{id}', [Kategori_MontirController::class, 'show'])->name('kategori_montir.show');
Route::get('/kategori_montir/edit/{id}', [Kategori_MontirController::class, 'edit'])->name('kategori_montir.edit');
Route::post('/kategori_montir/update/{id}', [Kategori_MontirController::class, 'update'])->name('kategori_montir.update');

