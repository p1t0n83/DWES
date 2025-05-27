<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>{{ $producto->titulo }}</div>
    <a href="{{ route('productos.edit',$producto->slug) }}">Editar</a>
    <form action="{{ route('productos.destroy', $producto->slug) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Borrar</button>
    </form>
</body>
</html>