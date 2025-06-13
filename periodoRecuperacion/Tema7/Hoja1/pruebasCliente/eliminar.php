<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <label for="id">Id del producto a borrar:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit">Eliminar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $url_servicio = 'http://localhost:8001/api/productos/' . $id;

        $curl = curl_init($url_servicio);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $respuesta_curl = curl_exec($curl);
        curl_close($curl);

        $respuesta = json_decode($respuesta_curl);

        if (!$respuesta || $respuesta->status === "error") {
            echo "No se pudo borrar el producto";
        } else {
            header('Location: obtener.php?success=3');
            exit;
        }
    }
    ?>
</body>

</html>