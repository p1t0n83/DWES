<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
Route::get('/', function () {
    return view('index');
});

Route::get('productos',[ProductosController::class,'index'])->name('productos.index');
Route::get('productos/create',[ProductosController::class,'create'])->name('productos.create');
Route::get('productos/{slug}/edit',[ProductosController::class,'edit'])->name('productos.edit');
Route::get('productos/{slug}',[ProductosController::class,'show'])->name('productos.show');
Route::put('productos',[ProductosController::class,'update'])->name('productos.update');
Route::post('productos',[ProductosController::class,'store'])->name('productos.store');
Route::delete('productos',[ProductosController::class,'destroy'])->name('productos.destroy');
