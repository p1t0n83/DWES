<?php
require_once "../vendor/autoload.php";
session_start();

// Guardar el usuario si viene por GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['usuario']) && !empty($_GET['usuario'])) {
        $_SESSION['usuario'] = $_GET['usuario'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
<header>
    <h1>Listado de productos</h1><br>

    <?php
    if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
        echo '<form action="login.php"><button>Iniciar sesión</button></form><br>';
    } else {
        echo '<form action="formulario.php"><button>Crear productos</button></form>';
        echo '<form action="logoff.php"><button>Desconectar usuario ' . $_SESSION['usuario'] . '</button></form><br>';
    }
    ?>
</header>

<main>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Familia</th>
            <th>Imagen</th>
            <?php
            if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
                echo '<th>Acciones</th>';
            }
            ?>
        </tr>
        <?php
        use App\clases\Produ;
        use App\clases\PDOProductos;
        use App\clases\Funciones;

        $produ = new Produ(new PDOProductos());
        $funciones = new Funciones();
        $productos = $produ->listarProductos();

        foreach ($productos as $producto) {
            $imagen = $funciones->getImagen($producto->__get("imagenId"));
            $familia = $funciones->getFamilia($producto->__get("familia"));

            echo "<tr>";
            echo "<td>" . $producto->__get("nombre") . "</td>";
            echo "<td>" . $producto->__get("descripcion") . "</td>";
            echo "<td>" . $producto->__get("precio") . "</td>";
            echo "<td>" . $familia->__get("nombre") . "</td>";
            echo "<td><img height='200px' src='" . $imagen->__get("url") . "'></td>";

            if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
                echo "<td>";
                echo '<form method="POST" action="borrar.php" style="display:inline">';
                echo '<input type="hidden" name="id" value="' . $producto->__get("id") . '">';
                echo '<button type="submit">Borrar</button>';
                echo '</form>';
                echo "</td>";
            }

            echo "</tr>";
        }
        ?>
    </table>
</main>
</body>
</html>
