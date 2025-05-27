<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])->name('inicio');
Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('productos/{slug}', [ProductoController::class, 'show'])->name('productos.show');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('productos/{slug}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('productos/{slug}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('productos/{slug}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Login
Route::get('login', function () {
    return view('login');
})->name('login');
Route::post('login', [AuthController::class, 'login']);