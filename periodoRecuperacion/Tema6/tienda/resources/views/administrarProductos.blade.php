@extends('layouts.plantilla')

@section('titulo', 'Listado de Productos')

@section('contenido')
    <h1 class="text-3xl font-extrabold mb-8 text-center text-white drop-shadow-lg">Listado de Videojuegos</h1>

    @if($productos->count())
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-900 rounded-xl shadow-lg text-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Nombre</th>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Descripción</th>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Precio</th>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Stock</th>
                        <th class="px-4 py-2 border-b border-gray-700 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-800">{{ $producto->nombre }}</td>
                            <td class="px-4 py-2 border-b border-gray-800">{{ $producto->descripcion }}</td>
                            <td class="px-4 py-2 border-b border-gray-800">{{ $producto->precio }} €</td>
                            <td class="px-4 py-2 border-b border-gray-800">{{ $producto->stock }}</td>
                            <td class="px-4 py-2 border-b border-gray-800 flex gap-2">
                                <a href="{{ route('productos.edit', $producto->slug) }}" class="bg-blue-600 hover:bg-blue-800 text-white px-3 py-1 rounded text-xs font-semibold transition">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->slug) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-800 text-white px-3 py-1 rounded text-xs font-semibold transition">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-400 mt-8">No hay productos disponibles.</p>
    @endif
@endsection

