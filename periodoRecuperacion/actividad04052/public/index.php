<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .acciones a {
            margin-right: 10px;
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .ver {
            background-color: #007bff;
        }

        .borrar {
            background-color: #dc3545;
        }

        .crear {
            background-color: #28a745;
        }

        .auth-links {
            margin-bottom: 20px;
        }

        .auth-links a {
            margin-right: 15px;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .login {
            background-color: #007bff;
        }

        .registro {
            background-color: #28a745;
        }
    </style>
</head>

<body>
   

    <h1>Listado de Productos</h1>
    <a href="formularioAlta.php" class="crear">Crear Nuevo Producto</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Familia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../vendor/autoload.php";
            use Ejercicio0405\clases\PDOProducto;
            use Ejercicio0405\clases\Produ;

            // Crear instancia de Produ
            $repositorio = new Produ(new PDOProducto());
            $productos = $repositorio->listarProductos();

            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    echo "<form method='POST'>";
                    echo "<input name='id' type='hidden' value='" . $producto->idproductos . "'>";
                    echo "<tr>";
                    echo "<td>{$producto->idproductos}</td>";
                    echo "<td>{$producto->nombre}</td>";
                    echo "<td>{$producto->descripcion}</td>";
                    echo "<td>{$producto->precio} €</td>";
                    echo "<td>{$producto->familia}</td>";
                    echo "<td class='acciones'>";
                    echo "<a href='detalle.php?id={$producto->idproductos}' class='ver'>Ver</a>";
                    echo "<button class='borrar'>Borrar</button>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</form>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay productos disponibles.</td></tr>";
            }
            ?>


            <?php
             if($_SERVER['REQUEST_METHOD']=='POST'){
                $repositorio->borrarProducto($_POST['id']);
                header("Location: index.php");
                exit;
             }
            ?>
        </tbody>
    </table>
</body>

</html>