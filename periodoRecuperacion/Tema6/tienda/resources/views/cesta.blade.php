@extends('layouts.plantilla')

@section('titulo', 'Tu Cesta')

@section('contenido')
<div class="max-w-3xl mx-auto bg-gray-900 rounded-xl shadow-lg p-8 mt-10 text-white">
    <h1 class="text-3xl font-bold mb-6">Tu Cesta</h1>
    @php
        $cesta = session('cesta', []);
    @endphp

    @if(session('success'))
        <div class="bg-green-700 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cesta) > 0)
        <table class="min-w-full bg-gray-800 rounded-lg overflow-hidden mb-8">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Producto</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Precio</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Cantidad</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Subtotal</th>
                    <th class="px-4 py-2 border-b border-gray-700 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cesta as $id => $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-800">{{ $item['nombre'] }}</td>
                        <td class="px-4 py-2 border-b border-gray-800">{{ $item['precio'] }} €</td>
                        <td class="px-4 py-2 border-b border-gray-800">{{ $item['cantidad'] }}</td>
                        <td class="px-4 py-2 border-b border-gray-800">{{ $subtotal }} €</td>
                        <td class="px-4 py-2 border-b border-gray-800">
                            <form action="{{ route('cesta.eliminar', $id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-800 text-white px-2 py-1 rounded text-xs">Quitar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="px-4 py-2 font-bold text-right">Total:</td>
                    <td class="px-4 py-2 font-bold">{{ $total }} €</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="flex flex-col md:flex-row gap-2">
            <form action="{{ route('cesta.vaciar') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-800 text-white px-4 py-2 rounded text-sm font-semibold transition">Vaciar cesta</button>
            </form>
            <form action="{{ route('cesta.finalizar') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-4 py-2 rounded text-sm font-semibold transition">Finalizar compra</button>
            </form>
            <a href="{{ route('productos.index') }}" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-semibold transition">Seguir comprando</a>
        </div>
    @else
        <p class="text-center text-gray-400">Tu cesta está vacía.</p>
        <div class="text-center mt-4">
            <a href="{{ route('productos.index') }}" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-semibold transition">Ver productos</a>
        </div>
    @endif
</div>
@endsection
