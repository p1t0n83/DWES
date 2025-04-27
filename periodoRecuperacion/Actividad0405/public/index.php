<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Tienda</title>
</head>
<body>
<?php
require_once "../vendor/autoload.php";

use Ejercicio0405\ClasesBD\PDOProducto;

$repositorio = new PDOProducto();
$productos = $repositorio->listar();

if (!empty($productos)) {
    echo "<h2>Listado de productos</h2>";
    echo "<ul>";
    foreach ($productos as $producto) {
        echo "<li>";
        echo "Nombre: " . htmlspecialchars($producto->nombre) . "<br>";
        echo "Descripción: " . htmlspecialchars($producto->descripcion) . "<br>";
        echo "Precio: " . htmlspecialchars($producto->precio) . " €<br>";
        echo "Familia: " . htmlspecialchars($producto->familia);
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay productos disponibles.</p>";
}
?>
</body>
</html>