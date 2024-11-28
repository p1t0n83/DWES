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
    use App\Clases\Product;
    use App\Clases\PDOCrearProducto;
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
    $nombreProducto = $_POST['nombre'];
    $producto=new Product(new PDOCrearProducto());   
    if($producto->borrarProducto($nombreProducto)){
        echo('El producto de nombre'.$nombreProducto.' se ha borrado con exito');
    }
}
?>
</body>

</html>