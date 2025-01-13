<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnimalController;



Route::get('/',InicioController::class)->name('inicio');
Route::get('animales',[AnimalController::class,'index'])->name('animales.index');
Route::get('animales/{animal}',[AnimalController::class,'Show'])->name('animales.how');
Route::get('animales/crear',[AnimalController::class,'Create'])->name('animales.create');
Route::get('animales/{animal}/editar',[AnimalController::class,'Edit'])->name('animales.edit');
