<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Inicio</title>
</head>

<body>
    <h1>Listado de productos</h1>
    <div class="tabla">
        <div class="encabezado">
            <div>NOMBRE</div>
            <div>PRECIO</div>
            <div>ACCIONES</div>
        </div>
        <?php
        require_once '../vendor/autoload.php';
        use App\Clases\PDOCrearProducto;
        $productos = PDOCrearProducto::obtenerProductos();
        foreach ($productos as $producto) {
            echo '<div class="fila">
                <div>' . $producto->getNombre() . '</div>
                <div>' . $producto->getPrecio() . '</div>
                <div>ACCIONES</div>
              </div>';
        }
        ?>
    </div>
</body>

</html>