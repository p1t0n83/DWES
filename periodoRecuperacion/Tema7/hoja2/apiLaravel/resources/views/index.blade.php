<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Productos</h1>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
        </tr>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto['nombre'] }}</td>
                <td>{{ $producto['descripcion'] }}</td>
                <td>{{ $producto['precio'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
