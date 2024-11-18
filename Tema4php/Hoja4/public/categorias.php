<?php
require '../vendor/autoload.php';
use App\ClasesBD\FuncionBD;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
</head>

<body>
    <form method="POST">
        <h1>Productos por categorias</h1>
        <select id="respuesta" name="respuesta">
            <option value="alimentacion">Alimentacion</option>
            <option value="electronica">Electronica</option>
            <option value="todos">Todos</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>
    <hr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $respuesta=$_POST['respuesta'];
        $productos = FuncionBD::getProductos($respuesta);
        foreach ($productos as $producto) {
            echo $producto->toString();
        }
    }
    ?>
    <a href="principal.php">Todos</a>
</body>

</html>