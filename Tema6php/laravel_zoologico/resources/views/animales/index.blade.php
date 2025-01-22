<!-- filepath: /c:/Users/Usuario/Documents/DWES/Tema6php/laravel_zoologico/resources/views/animales/index.blade.php -->
@extends('layouts.plantilla')
@section('titulo', 'Inicio')
@section('contenido')
    <h1 class="text-3xl font-bold underline mb-4">Página de inicio de animales</h1>
    @foreach ($animales as $animal)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <ul class="list-disc pl-5">
                <li class="mb-2"><strong>Especie:</strong> {{ $animal->especie }}</li>
                <li class="mb-2"><strong>Peso:</strong> {{ $animal->peso }} kg</li>
                <li class="mb-2"><strong>Altura:</strong> {{ $animal->altura }} cm</li>
                <li class="mb-2"><strong>Fecha de Nacimiento:</strong> {{ $animal->fechaNacimiento }}</li>
                <li class="mb-2"><strong>Alimentación:</strong> {{ $animal->alimentacion}}</li>
                <li class="mb-2"><strong>Descripción:</strong> {{ $animal->descripcion }}</li>
                <li class="mb-2">
                    <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="imagen de {{ $animal->especie }}" class="w-32 h-32 object-cover">
                </li>
            </ul>
        </div>
    @endforeach
@endsection
