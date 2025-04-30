<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .detalle-producto {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }
        .detalle-producto img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .detalle-producto h1 {
            margin-top: 0;
        }
        .volver {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    require_once "../vendor/autoload.php";
    use Ejercicio0405\clases\PDOProducto;
    use Ejercicio0405\clases\Produ;

    // Verificar si se ha proporcionado un ID válido
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Crear instancia de Produ y obtener el producto por ID
        $repositorio = new Produ(new PDOProducto());
        $producto = $repositorio->listarProductoId($id);

        if ($producto) {

            echo "<div class='detalle-producto'>";
            echo "<h1>{$producto->nombre}</h1>";
            echo "<p><strong>Descripción:</strong> {$producto->descripcion}</p>";
            echo "<p><strong>Precio:</strong> {$producto->precio} €</p>";
            echo "<p><strong>Familia:</strong> {$producto->familia}</p>";

            // Mostrar la imagen si existe
            
                echo "<img src='img/{$producto->imagen}' alt='Imagen de {$producto->nombre}'>";
           

            echo "</div>";
        } else {
            echo "<p>No se encontró el producto con el ID proporcionado.</p>";
        }
    } else {
        echo "<p>No se ha proporcionado un ID válido.</p>";
    }
    ?>
    <a href="index.php" class="volver">Volver al listado</a>
</body>
</html>