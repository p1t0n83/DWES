@extends('layouts.plantilla')
@section('titulo','Listado de animales')
@section('contenido')
<h1 class="text-3x1 font-bold underline">Página principal de los animales</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($animales as $animal)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}" class=" h-48 object-cover">
            <div class="p-4">
                <h2 class="text-2xl font-semibold mb-2">{{ $animal->especie }}</h2>
                <p><span class="font-semibold">Peso:</span> {{ $animal->peso }} kg</p>
                <p><span class="font-semibold">Altura:</span> {{ $animal->altura }} cm</p>
                <p><span class="font-semibold">Fecha de nacimiento:</span> {{ $animal->fechaNacimiento }}</p>
                <p><span class="font-semibold">Alimentación:</span> {{ $animal->alimentacion }}</p>
                <a href="{{ route('animales.show', $animal->especie) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Ver detalles
                </a>
            </div>
        </div>
    @endforeach
</div>

@endsection

