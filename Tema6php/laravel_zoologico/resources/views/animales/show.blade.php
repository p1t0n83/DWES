@extends('layouts.plantilla')

@section('titulo', 'Detalles del Animal')

@section('contenido')
<div class="container">
    <div class="row flex items-center"> <!-- Agregar flexbox al contenedor -->
        <!-- Columna de la imagen a la izquierda -->
        <div class="pr-1 w-3/3"> <!-- Aumentar el tamaño de la imagen -->
            <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}" class="w-full max-h-96 object-contain rounded-md">
        </div>

        <!-- Columna de los detalles a la derecha -->
        <div class="w-1/3">
            <h2>{{ $animal->especie }}</h2>
            <p><strong>Peso:</strong> {{ $animal->peso }} kg</p>
            <p><strong>Altura:</strong> {{ $animal->altura }} cm</p>
            <p><strong>Edad:</strong> {{ $animal->getEdad()}}</p>
            <p><strong>Alimentación:</strong> {{ $animal->alimentacion }}</p>
            <p><strong>Descripción:</strong> {{ $animal->descripcion }}</p>
            <p><strong>Revisiones:</strong>{{$animal->revisiones()->count()}}</p>
        </div>
    </div>

    <!-- Botones -->
    <div class="row mt-4">
        <!-- Botón para volver a la lista -->
        <div class="col-md-6">
            <a href="{{ route('animales.index') }}" class="btn btn-secondary btn-lg btn-block">Volver a la lista</a>
        </div>

        <!-- Botón para editar el animal -->
        <div class="col-md-6">
            <a href="{{ route('animales.edit', $animal) }}" class="btn btn-primary btn-lg btn-block">Editar</a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('revisiones.create', $animal) }}" class="btn btn-primary btn-lg btn-block">Crear revision</a>
        </div>
    </div>
</div>
@endsection


