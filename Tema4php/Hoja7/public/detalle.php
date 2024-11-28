<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
</head>

<body>
    <?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use App\Clases\Product;
    use App\Clases\PDOCrearProducto;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $nombre=$_POST['nombre'];
     $product=new Product(new PDOCrearProducto());
     $producto=$product->obtenerProducto($nombre);
     if ($producto) {
        echo '<h1>Detalle del producto</h1>';
        echo '<p>Nombre: ' . $producto->getNombre() . '</p>';
        echo '<p>Precio: ' . $producto->getPrecio() . '</p>';
        echo '<p>Descripción: ' . $producto->getDescripcion() . '</p>';

        // Ruta de la imagen
        $imagenPath = 'products/' . $producto->getImagen();
        echo '<p><img src="' . $imagenPath . '" alt="Imagen de ' . $producto->getNombre() . '" style="max-width: 300px; max-height: 300px;"></p>';
    } else {
        echo '<p>No se encontró el producto solicitado.</p>';
    }
}

    ?>
    <a href="index.php">Volver listar</a>
</body>

</html>