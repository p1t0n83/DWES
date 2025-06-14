<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoginController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Rutas públicas para 'index' y 'show'
Route::apiResource('productos', ProductoController::class)->only(['index', 'show']);

// Rutas protegidas por auth:sanctum para crear, actualizar y eliminar
Route::middleware('auth:sanctum')->group(function () {
    Route::post('productos', [ProductoController::class, 'store']);
    Route::put('productos/{producto}', [ProductoController::class, 'update']);
    Route::patch('productos/{producto}', [ProductoController::class, 'update']);
    Route::delete('productos/{producto}', [ProductoController::class, 'destroy']);
});
Route::post('/login', LoginController::class);
