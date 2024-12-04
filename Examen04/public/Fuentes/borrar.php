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
    $product=new Product(new Funciones());
    If($_GET['id']!=null){
    $id=$_GET['id'];
    if($product->borrar($id)){
        echo 'Se ha borrado con exito';
    }else{
        echo 'No se pudo borrar';
    }
    }
    ?>
</body>
</html>