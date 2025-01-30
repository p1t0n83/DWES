@extends('layouts.plantilla')

@section('titulo', 'Detalles del Animal')

@section('contenido')
<div class="container">
    <div class="row">
        <!-- Columna de la imagen -->
        <div class="col-md-6">
            <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}" class="img-fluid">
        </div>

        <!-- Columna de los detalles -->
        <div class="col-md-6">
            <h2>{{ $animal->especie }}</h2>
            <p><strong>Peso:</strong> {{ $animal->peso }} kg</p>
            <p><strong>Altura:</strong> {{ $animal->altura }} cm</p>
            <p><strong>Edad:</strong> {{ $animal->getEdad()}}</p>
            <p><strong>Alimentación:</strong> {{ $animal->alimentacion }}</p>
            <p><strong>Descripción:</strong> {{ $animal->descripcion }}</p>
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
            <a href="{{ route('animales.edit', $animal->especie) }}" class="btn btn-primary btn-lg btn-block">Editar</a>
        </div>
    </div>
</div>
@endsection
