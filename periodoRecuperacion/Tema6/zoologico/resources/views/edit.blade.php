@extends('layouts.plantilla')

@section('titulo', 'Editar animal')

@section('contenido')
<h1 class="text-3xl font-bold underline mb-6">Editar animal</h1>

<form method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-2xl p-6 max-w-2xl mx-auto">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="especie" class="block text-gray-700 font-semibold mb-2">Especie:</label>
        <input type="text" name="especie" id="especie"
            class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label for="peso" class="block text-gray-700 font-semibold mb-2">Peso (kg):</label>
        <input type="number" step="0.01" name="peso" id="peso" 
            class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label for="altura" class="block text-gray-700 font-semibold mb-2">Altura (cm):</label>
        <input type="number" step="0.01" name="altura" id="altura" 
            class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label for="fecha_nacimiento" class="block text-gray-700 font-semibold mb-2">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" 
            class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label for="alimentacion" class="block text-gray-700 font-semibold mb-2">Alimentación:</label>
        <input type="text" name="alimentacion" id="alimentacion" 
            class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen del animal (opcional):</label>
        <input type="file" name="imagen" id="imagen" accept="image/*"
            class="w-full border border-gray-300 rounded p-2">
    </div>

    <div class="text-right">
        <button type="submit"
            class="bg-yellow-500 text-white font-semibold px-4 py-2 rounded hover:bg-yellow-600">
            Modificar animal
        </button>
    </div>
</form>
@endsection
