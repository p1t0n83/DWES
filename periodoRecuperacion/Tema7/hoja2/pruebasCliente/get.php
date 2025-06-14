<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ver Producto</title>
</head>

<body>
    <form method="get">
        <label for="id">
            <input type="number" placeholder="id" name="id" id="id" required min="1" />
        </label>
        <button type="submit">Ver</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']); // convertir a entero para mayor seguridad
        if ($id > 0) {
            $url_servicio = "http://localhost:8000/api/productos/" . $id;
            $curl = curl_init($url_servicio);

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json']);

            $respuesta_curl = curl_exec($curl);
            curl_close($curl);

            $respuesta = json_decode($respuesta_curl);

            if ($respuesta && isset($respuesta->success) && $respuesta->success && isset($respuesta->data)) {
                $producto = $respuesta->data;

                echo '<h2>Producto ID ' . $id . '</h2>';
                echo '<p><strong>Nombre:</strong> ' . htmlspecialchars($producto->nombre) . '</p>';
                echo '<p><strong>Precio:</strong> ' . htmlspecialchars($producto->precio) . '</p>';
                echo '<p><strong>Descripción:</strong> ' . htmlspecialchars($producto->descripcion) . '</p>';

                if (!empty($producto->imagen_url)) {
                    echo '<p><strong>Imagen:</strong><br><img src="' . htmlspecialchars($producto->imagen_url) . '" alt="' . htmlspecialchars($producto->nombre) . '" style="max-height:150px;"></p>';
                }
            } else {
                echo '<p>No se pudo obtener el producto con ID ' . htmlspecialchars($id) . '.</p>';
            }
        } else {
            echo '<p>ID no válido.</p>';
        }
    }
    ?>
</body>

</html>
