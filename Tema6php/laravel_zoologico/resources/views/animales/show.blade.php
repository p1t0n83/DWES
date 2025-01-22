<!-- filepath: /c:/Users/Usuario/Documents/DWES/Tema6php/laravel_zoologico/resources/views/animales/show.blade.php -->
@extends('layouts.plantilla')

@section('titulo', 'Mostrar animales')

@section('contenido')
    <h1 class="text-3xl font-bold underline mb-4">Página de inicio de {{ $animal->especie }}</h1>
    <div class="flex flex-col md:flex-row bg-white shadow-md rounded-lg p-4 mb-4">
        <div class="md:w-1/3">
            <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="imagen de {{ $animal->especie }}" class="w-full h-auto object-cover">
        </div>
        <div class="md:w-2/3 md:pl-4">
            <ul class="list-disc pl-5">
                <li class="mb-2"><strong>Especie:</strong> {{ $animal->especie }}</li>
                <li class="mb-2"><strong>Peso:</strong> {{ $animal->peso }} kg</li>
                <li class="mb-2"><strong>Altura:</strong> {{ $animal->altura }} cm</li>
                <li class="mb-2"><strong>Fecha de Nacimiento:</strong> {{ $animal->fechaNacimiento }}</li>
                <li class="mb-2"><strong>Alimentación:</strong> {{ $animal->alimentacion }}</li>
                <li class="mb-2"><strong>Descripción:</strong> {{ $animal->descripcion }}</li>
            </ul>
        </div>
    </div>
    <div class="flex space-x-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Editar animal
        </button>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Volver al Listado
        </button>
    </div>
@endsection
