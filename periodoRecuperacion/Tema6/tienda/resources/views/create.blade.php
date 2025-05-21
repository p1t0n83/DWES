@extends('layouts.plantilla')

@section('titulo', 'Crear Producto')

@section('contenido')
    <div class="max-w-xl mx-auto bg-gray-900 rounded-xl shadow-lg p-8 mt-10 text-white">
        <h1 class="text-2xl font-bold mb-6">Nuevo Producto</h1>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block mb-1 font-semibold">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="w-full rounded p-2 text-black" required value="{{ old('nombre') }}">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block mb-1 font-semibold">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full rounded p-2 text-black" required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="precio" class="block mb-1 font-semibold">Precio (€)</label>
                <input type="number" name="precio" id="precio" class="w-full rounded p-2 text-black" step="0.01" required value="{{ old('precio') }}">
            </div>

            <div class="mb-4">
                <label for="stock" class="block mb-1 font-semibold">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full rounded p-2 text-black" required value="{{ old('stock') }}">
            </div>

            <div class="mb-4">
                <label for="familia" class="block mb-1 font-semibold">Familia</label>
                <input type="number" name="familia" id="familia" class="w-full rounded p-2 text-black" required value="{{ old('familia') }}">
            </div>

            <div class="mb-6">
                <label for="imagen" class="block mb-1 font-semibold">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="w-full text-white" accept="image/*" required>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded font-semibold transition">Crear Producto</button>
        </form>
    </div>
@endsection