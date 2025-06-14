<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Producto</title>
</head>

<body>
    <h1>Formulario de edición</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="id">ID del Producto:<br>
            <input type="text" name="id" id="id" required value="<?= $_POST['id'] ?? '' ?>"><br>
        </label>
        <label for="nombre">Nombre:<br>
            <input type="text" name="nombre" id="nombre" required value="<?= $_POST['nombre'] ?? '' ?>"><br>
        </label>
        <label for="descripcion">Descripción:<br>
            <input type="text" name="descripcion" id="descripcion" required value="<?= $_POST['descripcion'] ?? '' ?>"><br>
        </label>
        <label for="precio">Precio:<br>
            <input type="number" step="0.01" name="precio" id="precio" required value="<?= $_POST['precio'] ?? '' ?>"><br>
        </label>
        <label for="stock">Stock:<br>
            <input type="number" name="stock" id="stock" required value="<?= $_POST['stock'] ?? '' ?>"><br>
        </label>
        <label for="categoria">Categoría:<br>
            <select name="categoria" id="categoria" required>
                <option value="">--Selecciona categoría--</option>
                <option value="1" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 1) ? 'selected' : '' ?>>Electrodomésticos</option>
                <option value="2" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 2) ? 'selected' : '' ?>>Informática</option>
                <option value="3" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 3) ? 'selected' : '' ?>>Telefonía</option>
                <option value="4" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 4) ? 'selected' : '' ?>>Moda</option>
                <option value="5" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 5) ? 'selected' : '' ?>>Deporte</option>
                <option value="6" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 6) ? 'selected' : '' ?>>Hogar</option>
                <option value="7" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 7) ? 'selected' : '' ?>>Jardín</option>
                <option value="8" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 8) ? 'selected' : '' ?>>Bricolaje</option>
                <option value="9" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 9) ? 'selected' : '' ?>>Mascotas</option>
                <option value="10" <?= (isset($_POST['categoria']) && $_POST['categoria'] == 10) ? 'selected' : '' ?>>Juguetes</option>
            </select><br>
        </label>
        <label for="imagen">Imagen (opcional para edición):<br>
            <input type="file" name="imagen" id="imagen" accept="image/*"><br>
        </label>
        <button type="submit">Actualizar Producto</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'
        && isset($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $_POST['categoria'])
    ) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria_id = $_POST['categoria'];

        // Preparar datos del producto
        $producto = [
            "id" => $id,  // Agregar el ID en el cuerpo de la petición
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "stock" => $stock,
            "categoria_id" => $categoria_id,
        ];

        // Procesar imagen solo si se subió una nueva
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['imagen']['tmp_name'];
            $name = $_FILES['imagen']['name'];

            // Crear CURLFile para enviar la imagen
            $cfile = new CURLFile($tmp_name, mime_content_type($tmp_name), $name);
            $producto["imagen"] = $cfile;
        }

        // URL para actualizar (usando POST como mencionaste que PUT va por POST)
        $url_servicio = 'http://localhost:8000/api/productos/' . $id;
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
        } elseif ($http_code !== 200 && $http_code !== 204) {
            echo "<h3>Error al actualizar el producto</h3>";
            echo "<p>Código HTTP: $http_code</p>";
            echo "<pre>";
            print_r($resultado ?: $respuesta_curl);
            echo "</pre>";
        } else {
            // Redirigir al listado o página deseada tras éxito
            header('Location: obtener.php?success=1');
            exit;
        }
    }
    ?>
</body>

</html>