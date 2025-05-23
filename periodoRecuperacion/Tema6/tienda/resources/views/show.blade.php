@extends('layouts.plantilla')

@section('titulo', 'Detalle del Producto')

@section('contenido')
    <div class="max-w-3xl mx-auto bg-gray-900 rounded-xl shadow-lg p-8 mt-10 text-white">
        <h1 class="text-3xl font-bold mb-6">{{ $producto->nombre }}</h1>
        @php
            $imagen = $producto->imagenes()->first();
        @endphp
        <div class="mb-6 flex justify-center">  
                <img src="{{ asset('imagenes/'.$imagen->url) }}" alt="Sin imagen" class="w-full max-w-md h-96 object-cover rounded-lg border border-gray-700 shadow-md">      
        </div>
        <p class="mb-4"><span class="font-semibold">Descripción:</span> {{ $producto->descripcion }}</p>
        <p class="mb-2"><span class="font-semibold">Precio:</span> <span class="text-blue-400 font-bold">{{ $producto->precio }} €</span></p>
        <p class="mb-2"><span class="font-semibold">Stock:</span> {{ $producto->stock }}</p>
         <a href="#" class="inline-block mt-6 bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-semibold transition">pa la saca</a>
        <a href="{{ route('productos.index') }}" class="inline-block mt-6 bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-semibold transition">Volver al listado</a>
    </div>
    <form action="{{ route('cesta.agregar', $producto->id) }}" method="POST">
        @csrf
        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-3 py-1 rounded">Añadir a la cesta</button>
    </form>
@endsection

