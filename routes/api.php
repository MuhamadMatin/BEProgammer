<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MasterBarangController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('barang', MasterBarangController::class);
    Route::patch('stock/{id}', [MasterBarangController::class, 'stock']);
    Route::post('price', [MasterBarangController::class, 'price']);
    Route::post('stock_day', [MasterBarangController::class, 'stockPerDay']);
    Route::post('price_day', [MasterBarangController::class, 'pricePerDay']);
    // Route::apiResource('user', UserController::class);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
