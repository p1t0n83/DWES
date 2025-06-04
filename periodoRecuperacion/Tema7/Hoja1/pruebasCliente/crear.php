<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de creacion</h1>
    <form method="get">
    <label for="nombre">Nombre: <br>
        <input type="text" name="nombre" id="nombre"><br>
    </label>
    <label for="descripcion">Descripcion: <br>
        <input type="text" name="descripcion" id="descripcion"><br>
    </label>
    <label for="precio">Precio: <br>
        <input type="number" name="precio" id="precio"><br>
    </label>
    <button>Crear Producto</button>
    </form>


    <?php
    if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['nombre']) && isset($_GET['descripcion']) && isset($_GET['precio'])){
    $nombre=$_GET['nombre'];
    $descripcion=$_GET['descripcion'];
    $precio=$_GET['precio'];
    /**tengo que pasar asi los datos porque es lo que espera CURLOPT_POSTFIELDS */
    $producto = [
    "nombre" => $nombre,
    "descripcion" => $descripcion,
    "precio" => $precio
    ];


    $url_servicio= 'http://localhost:8001/api/productos';

    $curl=curl_init($url_servicio);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($curl,CURLOPT_POSTFIELDS,$producto);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $respuesta_curl=curl_exec($curl);
    $resultado=json_decode( $respuesta_curl);
        if (curl_errno($curl) || !$resultado || (isset($resultado->status) && $resultado->status == "error")) {
     echo 'Error al guardar el producto';
    }  else {

    header('Location: obtener.php');
    exit;
}

        curl_close($curl);
}
    ?>
</body>
</html>