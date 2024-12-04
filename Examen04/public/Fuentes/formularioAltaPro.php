<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form method="POST">
   <h1>Alta de Productos</h1>
    <label for="nombre">
        <input type="text id="nombre" name="nombre" placeholder="Nombre">
    </label>
    <br>
    <label for="descripcion">
        <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion">
    </label>
    <br>
    <label for="precio">
        <input type="float" id="precio" name="precio" placeholder="Precio" step="0.01">
    </label>
    <br>
    <select id="familia" name="familia">Selecciona una familia: 
  <?php
    require_once '../../vendor/autoload.php';
    use App\Interfaces\InterfazObjeto;
    use App\Clases\Producto\Product;
    use App\Clases\producto\Funciones;
    $product=new Product(new Funciones());
    $familias=$product->getFamilias();
    foreach($familias as $familia){
        echo '<option value="'.$familia['codigo'].'">'.$familia['nombre'].'</option>';
    }
  ?>
    </select>
    <br>
    <input type="text" id="imagen" name="imagen" placeholder="No se ha seleccionado ningún archivo">
    <br>
    <button type="submit">Enviar</button>
</form>

</body>
</html>