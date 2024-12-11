<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   require_once '../../vendor/autoload.php';
   use App\Interfaces\InterfazObjeto;
   use App\Clases\Producto\Product;
   use App\Clases\producto\Funciones;
   if($_SERVER['REQUEST_METHOD']=='GET'){
    $id=$_GET['id'];
   $product=new Product(new Funciones());
   $producto=$product->listarPorId($id);
   $nombre=$producto->getNombre();
   $descripcion=$producto->getDescripcion();
   $precio=$producto->getPrecio();
   $idFamilia=$producto->getFamilia();
   $idImagen=$producto->getImagenId();
   }
   ?>
    <h1>Detalle del producto</h1>

    <p>Nombre:<?php echo ($nombre); ?></p>

    <p>Descripcion:<?php echo ($descripcion)?></p>

    <p>Precio:<?php echo ($precio)?></p>

    <p>Familia:<?php echo ($idFamilia)?></p>
    
   
</body>
</html>