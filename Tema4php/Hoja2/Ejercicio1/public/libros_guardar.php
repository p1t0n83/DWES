<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibrosGuardar</title>
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
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $titulo=$_POST['titulo'];
        $edicion=$_POST['edicion'];
        $precio=$_POST['precio'];
        $adquisicion=$_POST['adquisicion'];
        $funciones->agregarLibro($titulo,$edicion,$precio,$adquisicion);
    }
    ?>
</body>
</html>