<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[InicioController::class,'inicio'])->name("inicio");
Route::get('animales',[AnimalController::class,'index'])->name('index');
Route::get('animales/crear',[AnimalController::class,'create'])->name('create');
Route::get('animales/{animal}',[AnimalController::class,'show'])->name('show');
Route::get('animales/{animal}/editar',[AnimalController::class,'edit'])->name('edit');
