<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Productos</h1>
    <table border=1>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
        <?php
        $url_servicio = "http://localhost:8000/api/productos";
        $curl = curl_init($url_servicio);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Accept: application/json']);

        $respuesta_curl = curl_exec($curl);
        $productos = json_decode($respuesta_curl);

        if (!isset($productos->data)) {
            echo "<p>Error: No se pudo obtener la lista de productos.</p>";
            echo "<pre>Respuesta de la API:\n" . htmlentities($respuesta_curl) . "</pre>";
        } else {
            echo '<pre>Respuesta API completa:' . PHP_EOL;
print_r($productos);
echo '</pre>';

            foreach ($productos->data as $producto) {
                echo '<tr> 
                        <td>' . htmlspecialchars($producto->nombre) . '</td>
                        <td>' . htmlspecialchars($producto->descripcion) . '</td>
                        <td>' . htmlspecialchars($producto->precio) . '</td>
                        <td>';
                echo '<pre>'; var_dump($producto->imagen_url); echo '</pre>';

                if (!empty($producto->imagen_url)) {
                    echo '<img src="' . htmlspecialchars($producto->imagen_url) . '" alt="' . htmlspecialchars($producto->nombre) . '" style="max-height:100px;">';
                } else {
                    echo 'Sin imagen';
                }
                
                echo '</td>
                    </tr>';
            }
        }
        curl_close($curl);
        ?>
    </table>
</body>
</html>
