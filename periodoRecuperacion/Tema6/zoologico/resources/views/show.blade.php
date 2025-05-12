@extends('layouts.plantilla')
@section('titulo','Mostrar animal')
@section('contenido')
<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-xl shadow-lg p-6">
        <!-- Imagen del animal -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}" class="rounded-lg object-cover">
        </div>

        <!-- Detalles del animal -->
        <div>
            <h2 class="text-3xl font-bold mb-4">{{ $animal->especie }}</h2>
            <p class="mb-2"><span class="font-semibold">Peso:</span> {{ $animal->peso }} kg</p>
            <p class="mb-2"><span class="font-semibold">Altura:</span> {{ $animal->altura }} cm</p>
            <p class="mb-2"><span class="font-semibold">Fecha de nacimiento:</span> {{ $animal->fechaNacimiento }}</p>
            <p class="mb-2"><span class="font-semibold">Alimentación:</span> {{ $animal->alimentacion }}</p>
            <p class="mb-4 text-gray-600">{{ $animal->descripcion }}</p>

            <div class="flex gap-4">
                <a href="{{ route('animales.edit', 0) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Editar animal</a>
                <a href="{{ route('animales.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver al listado</a>
            </div>
        </div>
    </div>
</div>
@endsection
