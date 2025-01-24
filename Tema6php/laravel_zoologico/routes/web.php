<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnimalController;



Route::get('/',InicioController::class)->name('inicio');
Route::get('animales',[AnimalController::class,'index'])->name('animales.index');
Route::get('animales/crear',[AnimalController::class,'Create'])->name('animales.create')->middleware('auth');;
Route::get('animales/{animal}',[AnimalController::class,'Show'])->name('animales.show');
Route::get('animales/{animal}/editar',[AnimalController::class,'Edit'])->name('animales.edit')->middleware('auth');
Route::post('animales', [AnimalController::class, 'store'])->name('animales.store');
Route::put('animales/{animal}', [AnimalController::class,'Update'])->name('animales.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
