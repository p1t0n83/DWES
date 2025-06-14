<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Producto</title>
</head>

<body>
    <h1>Formulario de creación</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:<br>
            <input type="text" name="nombre" id="nombre" required><br>
        </label>
        <label for="descripcion">Descripción:<br>
            <input type="text" name="descripcion" id="descripcion" required><br>
        </label>
        <label for="precio">Precio:<br>
            <input type="number" step="0.01" name="precio" id="precio" required><br>
        </label>
        <label for="stock">Stock:<br>
            <input type="number" name="stock" id="stock" required><br>
        </label>
        <label for="categoria">Categoría:<br>
            <select name="categoria" id="categoria" required>
                <option value="">--Selecciona categoría--</option>
                <option value="1">Electrodomésticos</option>
                <option value="2">Informática</option>
                <option value="3">Telefonía</option>
                <option value="4">Moda</option>
                <option value="5">Deporte</option>
                <option value="6">Hogar</option>
                <option value="7">Jardín</option>
                <option value="8">Bricolaje</option>
                <option value="9">Mascotas</option>
                <option value="10">Juguetes</option>
            </select><br>
        </label>
        <label for="imagen">Imagen:<br>
            <input type="file" name="imagen" id="imagen" accept="image/*" required><br>
        </label>
        <button type="submit">Crear Producto</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'
        && isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['categoria'])
    ) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria_id = $_POST['categoria'];

        // Procesar imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['imagen']['tmp_name'];
            $name = $_FILES['imagen']['name'];

            // Crear CURLFile para enviar la imagen
            $cfile = new CURLFile($tmp_name, mime_content_type($tmp_name), $name);
        } else {
            echo "<p>Error: Debes subir una imagen válida.</p>";
            exit;
        }

        $producto = [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "stock" => $stock,
            "categoria_id" => $categoria_id,
            "imagen" => $cfile,
        ];

        $url_servicio = 'http://localhost:8000/api/productos';
        $curl = curl_init($url_servicio);

        $token = $_SESSION['token'] ?? '';

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $producto); // Enviar como formulario multipart/form-data
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Accept: application/json',
            // No poner Content-Type, que cURL lo pone automáticamente para multipart/form-data con boundary
        ]);

        $respuesta_curl = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error_curl = curl_error($curl);
        curl_close($curl);

        $resultado = json_decode($respuesta_curl, true);

        if ($error_curl) {
            echo "<p>Error cURL: $error_curl</p>";
        } elseif ($http_code !== 201) {
            echo "<h3>Error al guardar el producto</h3>";
            echo "<p>Código HTTP: $http_code</p>";
            echo "<pre>";
            print_r($resultado ?: $respuesta_curl);
            echo "</pre>";
        } else {
            // Redirigir al listado o página deseada tras éxito
            header('Location: obtener.php?success=2');
            exit;
        }
    }
    ?>
</body>

</html>
