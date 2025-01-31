@extends('layouts.plantilla')

@section('titulo', 'Añadir una nueva revisión')

@section('contenido')
<div class="container">
    <h2 class="text-3xl font-bold mb-4">Añadir una nueva revisión</h2>

    <form method="POST" action="{{ route('revisiones.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Campo Hidden para el ID del Animal -->
        <input type="hidden" name="animalId" value="{{ $animal->id }}">


        <!-- Campo de Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-lg font-medium">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-4 py-2 border rounded-lg" required></textarea>
        </div>
        @error('descripcion')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <!-- Campo de Fecha -->
        <div class="mb-4">
            <label for="fecha" class="block text-lg font-medium">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        @error('fecha')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <!-- Botón para añadir la revisión -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
                Añadir revisión
            </button>
        </div>
    </form>
</div>
@endsection
