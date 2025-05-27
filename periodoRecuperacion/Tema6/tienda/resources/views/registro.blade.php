@extends('layouts.plantilla')

@section('titulo', 'Registrarse')

@section('contenido')
<div class="flex justify-center items-center min-h-screen bg-gray-950">
    <div class="bg-gray-900 p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-white text-center">Registro de Cliente</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-1 text-white font-semibold">Nombre</label>
                <input type="text" name="name" id="name" required autofocus class="w-full rounded p-2 text-black" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-1 text-white font-semibold">Email</label>
                <input type="email" name="email" id="email" required class="w-full rounded p-2 text-black" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-1 text-white font-semibold">Contraseña</label>
                <input type="password" name="password" id="password" required class="w-full rounded p-2 text-black">
                @error('password')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded font-semibold transition">Registrarse</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-blue-400 hover:underline">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</div>
@endsection