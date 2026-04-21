<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Purchase-Request', function () {
    return view('admin.Request');
})->name('request');

Route::get('/Approval', function () {
    return view('admin.approval');
})->name('approval');

Route::get('/Purchase-Order', function () {
    return view('admin.order');
})->name('order');


Route::get('/dashboard', [KaryawanController::class, 'dashboard'])->name('dashboard');

//Fungsi CRUD KARYAWAN
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawans', [KaryawanController::class, 'store'])->name('karyawans.store');
Route::put('/karyawans/{karyawan}', [KaryawanController::class, 'update'])->name('karyawans.update');
Route::delete('/karyawans/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawans.destroy');

//Fungsi CRUD BARANG
Route::get('/barang', [BarangController::class, 'index'])->name('barangs.index');
Route::post('/barang', [BarangController::class, 'store'])->name('barangs.store');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barangs.update');
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barangs.destroy');

//fungsi CRUD REQUEST\
Route::get('/request', [BarangController::class, 'index'])->name('request.index');
Route::post('/request', [BarangController::class, 'store'])->name('request.store');
Route::put('/request/{barang}', [BarangController::class, 'update'])->name('request.update');
Route::delete('/request/{barang}', [BarangController::class, 'destroy'])->name('request.destroy');
//fungsi CRUD APPROVAL
//fungsi CRUD

