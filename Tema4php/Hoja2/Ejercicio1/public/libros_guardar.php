<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibrosGuardar</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    require_once '../vendor/autoload.php';
    use App\Clases\FuncionBD;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $titulo=$_POST['titulo'];
        $edicion=$_POST['edicion'];
        $precio=$_POST['precio'];
        $adquisicion=$_POST['adquisicion'];
        //si es estatico llamalo directamente de la clase
        FuncionBD::agregarLibro($titulo,$edicion,$precio,$adquisicion);
    }
    ?>
    <a href="libros.php">volver</a>
</body>
</html>