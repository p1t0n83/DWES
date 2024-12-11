<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    require_once '../vendor/autoload.php';
    use App\Interfaces\InterfazObjeto;
    use App\Clases\Producto\Product;
    use App\Clases\producto\Funciones;
    $product=new Product(new Funciones());
    $productos=$product->listar();
    if($productos==null){
        echo 'no hay productos';
    }else{
        echo '<h1>listado de productos</h1>';
        echo '<table border=1>';
        echo '<tr><th>NOMBRE</th><th>Precio</th><th>Acciones</th></tr>';
        foreach($productos as $producto){
          echo '<tr><td>'.$producto->getNombre().'</td><td>'.$producto->getPrecio().'</td><td><a href="/Fuentes/detalle.php?id='.$producto->getId().' && nombre='.$producto->getNombre().' && descripcion='.$producto->getDescripcion().' && precio='.$producto->getPrecio().' && familia='.$producto->getFamilia().' && imagenId='.$producto->getImagenId().'  ">Mas informacion</a><br><a href="/Fuentes/borrar.php?id='.$producto->getId().'">Borrar</a></td></tr>';
        }
    }
    echo '</table>';
   
    ?>
    <a href="Fuentes/formularioAltaPro.php">Crear Producto</a>
</body>
</html>