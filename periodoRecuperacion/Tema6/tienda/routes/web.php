<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;

// Página de inicio
Route::get('/', InicioController::class)->name('inicio');

// Rutas accesibles solo para administradores
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('productosadmin', [ProductoController::class, 'indexadmin'])->name('productos.indexadmin');
    Route::get('productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('productos/{slug}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('productos/{slug}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('productos/{slug}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});

// Rutas accesibles solo para clientes autenticados
Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('cesta', function () {
        return view('cesta');
    })->name('cesta');
    Route::post('cesta/agregar/{id}', [ProductoController::class, 'agregarACesta'])->name('cesta.agregar');
    Route::delete('cesta/eliminar/{id}', [ProductoController::class, 'eliminarDeCesta'])->name('cesta.eliminar');
    Route::delete('cesta/vaciar', [ProductoController::class, 'vaciarCesta'])->name('cesta.vaciar');
    Route::post('cesta/finalizar', [ProductoController::class, 'finalizarCompra'])->name('cesta.finalizar');
});

// Rutas públicas (acceso general)
Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('productos/{slug}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('login', function () { return view('login'); })->name('login');
Route::get('registro', function () { return view('registro'); })->name('registro');
Route::post('registro', [ProductoController::class, 'registro'])->name('registro');
Route::post('login', [ProductoController::class, 'login'])->name('login');
