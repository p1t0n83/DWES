@extends('layouts.plantilla')

@section('titulo', 'Zoologico')

@section('contenido')
<h1 class="text-3xl font-bold underline">Pagina principal del zoologico</h1>

<!-- Mostrar animales de manera vertical con imagen a la izquierda y texto a la derecha -->
<div class="space-y-6">
    @foreach ($animalesLista as $animal)
        <div class="flex bg-white p-4 rounded shadow-md">
            <!-- Imagen a la izquierda -->
            <div class="w-1/3 pr-4"> <!-- Ancho de la imagen 1/3 y padding derecho -->
                <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}"
                    class="w-full h-48 object-cover rounded">
            </div>

            <!-- Texto a la derecha -->
            <div class="w-2/3">
                <h2 class="text-2xl font-bold">{{ $animal->especie }}</h2>
                <p><strong>Peso:</strong> {{ $animal->peso}} kg</p>
                <p><strong>Altura:</strong> {{ $animal->altura }} cm</p>
                <p><strong>Fecha de Nacimiento:</strong>
                    {{ \Carbon\Carbon::parse($animal->fechaNacimiento)->format('d-m-Y') }}</p>
                <p><strong>Alimentación:</strong> {{ $animal->alimentacion }}</p>
                <p><strong>Descripción:</strong> {{ $animal->descripcion }}</p>
             
            </div>
            
        </div>
    @endforeach
</div>

@endsection