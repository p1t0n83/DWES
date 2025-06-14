<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eliminar Producto</title>
</head>

<body>
    <form method="post" novalidate>
        <label for="id">Id del producto a borrar:</label>
        <input type="number" name="id" id="id" required min="1" />
        <button type="submit">Eliminar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            echo "<p>Id inválido.</p>";
            exit;
        }

        if (!isset($_SESSION['token'])) {
            echo "<p>Error: No estás autenticado.</p>";
            exit;
        }

        $token = $_SESSION['token'];
        $url_servicio = "http://localhost:8000/api/productos/$id";

        $curl = curl_init($url_servicio);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            "Authorization: Bearer $token"
        ]);

        $respuesta_curl = curl_exec($curl);
        if ($respuesta_curl === false) {
            echo "<p>Error en la petición cURL: " . curl_error($curl) . "</p>";
            curl_close($curl);
            exit;
        }

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $respuesta = json_decode($respuesta_curl);

        if ($http_code >= 400 || !$respuesta || (isset($respuesta->status) && $respuesta->status === "error")) {
            echo "<p>Error al borrar el producto: " . ($respuesta->message ?? "Respuesta inesperada") . "</p>";
        } else {
            // Redirigir al listado con éxito
            header('Location: obtener.php?success=3');
            exit;
        }
    }
    ?>
</body>

</html>
