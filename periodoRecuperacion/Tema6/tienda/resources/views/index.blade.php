@extends('layouts.plantilla')

@section('titulo', 'Listado de Productos')

@section('contenido')
    <h1 class="text-3xl font-extrabold mb-8 text-center text-white drop-shadow-lg">Listado de Videojuegos</h1>

    @if($productos->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($productos as $producto)
                <div class="bg-gray-900 rounded-xl shadow-lg p-6 flex flex-col border-2 border-gray-800 hover:border-blue-600 transition">
                    @php
                        $imagen = $producto->imagenes()->first();
                    @endphp
                    @if($imagen)
                        <img src="{{ asset('assets/imagenes/' . $imagen->url) }}" alt="Imagen de {{ $producto->nombre }}" class="mb-5 w-full h-120 object-cover rounded-lg border border-gray-700 shadow-md">
                    @else
                        <img src="{{ asset('assets/imagenes/default.jpg') }}" alt="Sin imagen" class="mb-5 w-full h-96 object-cover rounded-lg border border-gray-700 shadow-md">
                    @endif
                    <h2 class="text-xl font-bold mb-2 text-white">{{ $producto->nombre }}</h2>
                    <p class="text-gray-300 mb-2">{{ $producto->descripcion }}</p>
                    <p class="text-blue-400 font-bold mb-2">Precio: {{ $producto->precio }} €</p>
                    <p class="text-gray-400 mb-4">Stock: {{ $producto->stock }}</p>
                    <a href="{{ route('productos.show', $producto->slug) }}" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm text-center font-semibold transition">Ver detalle</a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-400 mt-8">No hay productos disponibles.</p>
    @endif
@endsection

