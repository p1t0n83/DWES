<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <!--Ejercicio 4-->
    <h1>Ejercicio 4</h1>
    <?php
    require_once '../vendor/autoload.php';
    use App\Clases\ConexionBD;
    use App\Clases\FuncionBD;
    $connection = ConexionBD::getConnection();
    $funciones = new FuncionBD();
    ?>
    <form method="post" action="libros_guardar.php">
    <h3>Inserte los datos del libro:</h3>
        <label for="titulo">Titulo:<input type="text" name="titulo" id="titulo"></label><br>
        <label for="edicion">Año de edición:<input type="number" name="edicion" id="edicion"></label><br>
        <label for="precio">Precio:<input type="number" id="precio" name="precio" step="0.01"></label><br>
        <label for="adquisicion">Fecha de adquisicion:<input type="date" id="adquisicion" name="adquisicion"></label><br>
        <input type="submit" name="traspaso" id="traspaso" value="Guardar datos del libro">
        <hr>
        <a href="libros_datos.php">Mostrar los libros guardados</a>

    </form>
        </body>  

</html>