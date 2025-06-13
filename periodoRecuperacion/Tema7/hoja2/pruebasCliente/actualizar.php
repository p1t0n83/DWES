<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Formulario de edicion</h1>
    <form method="post">
        <label for="id">Id: <br>
            <input type="text" name="id" id="id"><br>
        </label>
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
            <button>Actualizar Producto</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['stock'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        /**tengo que pasar asi los datos porque es lo que espera CURLOPT_POSTFIELDS */
        $producto = [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "stock" => $stock,
            "id" => $id,
        ];

        $url_servicio = 'http://localhost:8000/api/productos/' . $id;
        $curl = curl_init($url_servicio);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($producto));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);



        $respuesta_curl = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $resultado = json_decode($respuesta_curl);
        curl_close($curl);

        if (curl_errno($curl) || !$resultado || (isset($resultado->status) && $resultado->status == "error") || $http_code >= 400) {
            echo 'Error al editar el producto<br>';
            echo "HTTP code: $http_code<br>";
            echo "Respuesta: $respuesta_curl";
        } else {
            header('Location: obtener.php?success=1');
            exit;
        }
    }
    ?>
</body>

</html>