<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
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
        $url_servicio = 'http://localhost:8000/api/productos/' . $id;
        $curl = curl_init($url_servicio);
        $token=$_SESSION['token'];
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $token
        ]);
        $respuesta_curl = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $respuesta = json_decode($respuesta_curl);

        if ($http_code >= 400 || !$respuesta || (isset($respuesta->status) && $respuesta->status === "error")) {
            echo "<p>Error al borrar el producto: " . ($respuesta->message ?? "Respuesta inesperada") . "</p>";
        } else {
            // Si quieres mostrar mensaje antes de redirigir, usa esta línea en lugar de header (y luego un redirect JS)
            // echo "<p>" . ($respuesta->message ?? "Producto borrado con éxito") . "</p>";

            // Redirigir tras éxito
            header('Location: obtener.php?success=3');
            exit;
        }
    }
    ?>
</body>

</html>
