<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Formulario de creacion</h1>
    <form method="post">
        <label for="nombre">Nombre: <br>
            <input type="text" name="nombre" id="nombre"><br>
        </label>
        <label for="descripcion">Descripcion: <br>
            <input type="text" name="descripcion" id="descripcion"><br>
        </label>
        <label for="precio">Precio: <br>
            <input type="number" name="precio" id="precio"><br>
        </label>
        <lable for="stock">Stock: <br>
            <input type="number" name="stock" id="stock"><br>
            </label>
            <button>Crear Producto</button>
    </form>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['stock'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $producto = [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "stock" => $stock
        ];

        $url_servicio = 'http://localhost:8000/api/productos';
        $curl = curl_init($url_servicio);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($producto));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $respuesta_curl = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE); // importante
        $resultado = json_decode($respuesta_curl, true); // true = array
    
        curl_close($curl);

        if ($http_code !== 201) {
            echo "<h3>Error al guardar el producto</h3>";
            echo "<pre>";
            print_r($resultado);
            echo "</pre>";
        } else {
            header('Location: obtener.php?success=2');
            exit;
        }
    }
    ?>
</body>

</html>