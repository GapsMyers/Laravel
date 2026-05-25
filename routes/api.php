<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::post('sanctum/token', [AuthController::class, 'store']);

Route::name('api.')->group(function (): void {
    Route::apiResource('karyawans', KaryawanController::class)->only(['index', 'show']);
    Route::apiResource('barangs', BarangController::class)->only(['index', 'show']);
});
