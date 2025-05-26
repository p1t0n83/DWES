<!-- filepath: resources/views/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear producto</title>
</head>
<body>
    <h1>Crear producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Título: <input type="text" name="titulo" required></label><br>
        <label>Descripción: <textarea name="descripcion" required></textarea></label><br>
        <label>Precio: <input type="number" name="precio" step="0.01" required></label><br>
        <label>Familia:
            <select name="familia" required>
                <option value="">Selecciona una familia</option>
                @foreach($familias as $familia)
                    <option value="{{ $familia->codigo }}">{{ $familia->nombre }}</option>
                @endforeach
            </select>
        </label><br>
        <label>Imagen: <input type="file" name="imagen"></label><br>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('inicio') }}">Volver</a>
</body>
</html>