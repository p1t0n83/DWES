<!-- filepath: resources/views/edit.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
</head>
<body>
    <h1>Editar producto</h1>
    <form action="{{ route('productos.update', $slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Título: <input type="text" name="titulo" value="{{ old('titulo', $producto->titulo ?? '') }}" required></label><br>
        <label>Descripción: <textarea name="descripcion" required>{{ old('descripcion', $producto->descripcion ?? '') }}</textarea></label><br>
        <label>Precio: <input type="number" name="precio" step="0.01" value="{{ old('precio', $producto->precio ?? '') }}" required></label><br>
        <label>Familia:
            <select name="familia" required>
                <option value="">Selecciona una familia</option>
                @foreach($familias as $familia)
                    <option value="{{ $familia->codigo }}" {{ $producto->familia == $familia->codigo ? 'selected' : '' }}>
                        {{ $familia->nombre }}
                    </option>
                @endforeach
            </select>
        </label><br>
        <label>Imagen: <input type="file" name="imagen"></label><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('inicio') }}">Volver</a>
</body>
</html>