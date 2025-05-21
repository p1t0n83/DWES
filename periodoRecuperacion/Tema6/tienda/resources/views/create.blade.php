@extends('layouts.plantilla')

@section('titulo', 'Crear Producto')

@section('contenido')
    <div class="max-w-xl mx-auto bg-gray-900 rounded-xl shadow-lg p-8 mt-10 text-white">
        <h1 class="text-2xl font-bold mb-6">Nuevo Producto</h1>
        <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @php
            $familias = App\Models\Family::all();
            @endphp
            <div class="mb-4">
                <label for="nombre" class="block mb-1 font-semibold">Nombre
                <input type="text" name="nombre" id="nombre" class="w-full rounded p-2 text-black" required ></label>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block mb-1 font-semibold">Descripción
                <textarea name="descripcion" id="descripcion" class="w-full rounded p-2 text-black" required></textarea></label>
            </div>

            <div class="mb-4">
                <label for="precio" class="block mb-1 font-semibold">Precio (€)
                <input type="number" name="precio" id="precio" class="w-full rounded p-2 text-black" step="0.01" required ></label>
            </div>

            <div class="mb-4">
                <label for="stock" class="block mb-1 font-semibold">Stock
                <input type="number" name="stock" id="stock" class="w-full rounded p-2 text-black" required ></label>
            </div>

            <div class="mb-4">
                <label for="familia" class="block mb-1 font-semibold">Familia
                <select  name="familia" id="familia" class="w-full rounded p-2 text-black" required >
                    @foreach($familias as $familia)
                          <option value="{{$familia->id}}">{{$familia->nombre}}</option>
                    @endforeach
                </select>
                </label>
            </div>

            <div class="mb-6">
                <label for="imagen" class="block mb-1 font-semibold">Imagen
                <input type="file" name="imagen" id="imagen" class="w-full text-white" accept="image/*" ></label>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded font-semibold transition">Crear Producto</button>
        </form>
    </div>
@endsection
