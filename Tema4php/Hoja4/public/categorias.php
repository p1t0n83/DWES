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
        <select id="categoria" name="categoria" required>
            <option value="alimentacion" <?php echo (isset($_POST['categoria']) && $_POST['categoria'] == "alimentacion") ?  'selected' :  ' '; ?>>Alimentacion
            </option>
            <option value="electronica" <?php echo (isset($_POST['categoria']) && $_POST['categoria'] == "electronica") ? 'selected' : ' '; ?>>Electronica
            </option>
            <option value="todos" <?php echo (isset($_POST['categoria']) && $_POST['categoria'] === "todos") ? 'selected' : ' '; ?>>Todos</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>
    <hr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoria = $_POST['categoria'];
        $productos = FuncionBD::getProductos($categoria);
        foreach ($productos as $producto) {
            if ($producto != null) {
                echo $producto->toString();
            }
        }
    }
    ?>
      
    <a href="principal.php">Todos</a>
</body>

</html>