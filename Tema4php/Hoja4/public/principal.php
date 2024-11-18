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
   <?php
   $productos=FuncionBD::getProductos(null);
   foreach($productos as $producto){
       echo $producto->toString();
   }
   ?>
   <a href="categorias.php">Filtrar por categorias</a>
</body>
</html>