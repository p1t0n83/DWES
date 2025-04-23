<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<?php
require_once '../vendor/autoload.php';
use App\FuncionesBD;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $anio = $_POST['anio'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    $funciones=new FuncionesBD();
   if($funciones->ingresarLibro($titulo,$anio,$precio,$fecha)){
     echo "datos guardados correctamente";
   }else{
    echo "los datos no se pudieron guardar";
   }
   
}
?>
<hr>
<a href='libros.php'>Volver</a> 
</body>
</html>
