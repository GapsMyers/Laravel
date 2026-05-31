<?php

use App\Http\Controllers\Api\ApprovalController;
use App\Http\Controllers\Api\AuditLogController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KaryawanController;
use App\Http\Controllers\Api\StockRequestController;
use Illuminate\Support\Facades\Route;

Route::post('sanctum/token', [AuthController::class, 'store']);

Route::name('api.')->group(function (): void {
    Route::apiResource('karyawans', KaryawanController::class)->only(['index', 'show']);
    Route::apiResource('barangs', BarangController::class)->only(['index', 'show']);
    Route::get('approvals', [ApprovalController::class, 'index']);
    Route::get('approvals/{purchaseRequest}', [ApprovalController::class, 'show']);
    Route::get('audit-logs', [AuditLogController::class, 'index']);
    Route::post('stock-requests', [StockRequestController::class, 'store']);
});
