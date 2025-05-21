<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;

// Página de inicio
Route::get('/',InicioController::class)->name('inicio');

// Productos CRUD usando slug y vistas en resources/views/productos/
Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('productos/{slug}', [ProductoController::class, 'show'])->name('productos.show');
/*
Route::get('productos/{slug}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('productos/{slug}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('productos/{slug}', [ProductoController::class, 'destroy'])->name('productos.destroy');
*/
