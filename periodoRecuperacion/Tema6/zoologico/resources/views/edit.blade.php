@extends('layouts.plantilla')

@section('titulo', 'Editar animal')

@section('contenido')
    <h1 class="text-3xl font-bold underline mb-6">Editar animal</h1>

    <form action="{{ route('animales.update', $animal->especie) }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded-2xl p-6 max-w-2xl mx-auto">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $animal->id }}">
        <div class="mb-4">
            <label for="especie" class="block text-gray-700 font-semibold mb-2">Especie:</label>
            <input type="text" name="especie" id="especie" class="w-full border border-gray-300 rounded p-2"
                value="{{ $animal->especie }}">
            @error('especie')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="peso" class="block text-gray-700 font-semibold mb-2">Peso (kg):</label>
            <input type="number" step="0.01" name="peso" id="peso"
             class="w-full border border-gray-300 rounded p-2" value="{{$animal->peso}}">
            @error('peso')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="altura" class="block text-gray-700 font-semibold mb-2">Altura (cm):</label>
            <input type="number" step="0.01" name="altura" id="altura"
                class="w-full border border-gray-300 rounded p-2" value="{{$animal->altura}}">
            @error('altura')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="fechaNacimiento" class="block text-gray-700 font-semibold mb-2">Fecha de nacimiento:</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                class="w-full border border-gray-300 rounded p-2" value="{{$animal->fechaNacimiento}}">
            @error('fechaNacimiento')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="alimentacion" class="block text-gray-700 font-semibold mb-2">Alimentación:</label>
            <input type="text" name="alimentacion" id="alimentacion" class="w-full border border-gray-300 rounded p-2" value="{{$animal->alimentacion}}">
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen del animal:</label>
            <input type="file" name="imagen" id="imagen" accept="image/*"
                class="w-full border border-gray-300 rounded p-2" value="{{$animal->imagen}}">
            @error('imagen')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="w-full border border-gray-300 rounded p-2"></textarea>
        </div>

        <div class="text-right">
            <button class="bg-green-600 text-black font-semibold px-4 py-2 rounded hover:bg-green-700">
                Modificar animal
            </button>
        </div>
    </form>
@endsection
