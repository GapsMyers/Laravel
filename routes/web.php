<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\GoodsReceiptController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'Login')->name('login');

Route::get('/Purchase-Request', [RequestController::class, 'index'])->name('request');
Route::post('/Purchase-Request', [RequestController::class, 'store'])->name('request.store');

Route::get('/Approval', [RequestController::class, 'approvalIndex'])->name('approval');
Route::post('/Approval/{purchaseRequest}/approve', [RequestController::class, 'approve'])->name('approval.approve');
Route::post('/Approval/{purchaseRequest}/reject', [RequestController::class, 'reject'])->name('approval.reject');

Route::get('/Purchase-Order', function () {
    return view('admin.order');
})->name('order');

Route::get('/Goods-Receipt/{purchaseRequest?}', [GoodsReceiptController::class, 'show'])->name('goods-receipt');
Route::post('/Goods-Receipt/{purchaseRequest}/receive', [GoodsReceiptController::class, 'store'])
    ->name('goods-receipt.store');

Route::get('/Audit-Log', function () {
    return view('admin.audit-log');
})->name('audit-log');

Route::get('/dashboard', [KaryawanController::class, 'dashboard'])->name('dashboard');

// Fungsi CRUD KARYAWAN
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawans', [KaryawanController::class, 'store'])->name('karyawans.store');
Route::put('/karyawans/{karyawan}', [KaryawanController::class, 'update'])->name('karyawans.update');
Route::delete('/karyawans/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawans.destroy');

// Fungsi CRUD BARANG
Route::get('/barang', [BarangController::class, 'index'])->name('barangs.index');
Route::post('/barang', [BarangController::class, 'store'])->name('barangs.store');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barangs.update');
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barangs.destroy');

// fungsi CRUD APPROVAL
