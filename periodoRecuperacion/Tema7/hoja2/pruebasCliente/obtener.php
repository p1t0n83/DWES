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
        </tr>
    <?php
$url_servicio="http://localhost:8001/api/productos/listado";
$curl=curl_init($url_servicio);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"GET");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$respuesta_curl=curl_exec($curl);
$productos=json_decode( $respuesta_curl);
if (!isset($productos->data)) {
    echo "<p>Error: No se pudo obtener la lista de productos.</p>";
    echo "<pre>Respuesta de la API:\n" . htmlentities($respuesta_curl) . "</pre>";
} else {
    foreach ($productos->data as $producto) {
        echo '<tr> 
                <td>' . $producto->nombre . '</td>
                <td>' . $producto->descripcion . '</td>
                <td>' . $producto->precio . '</td>
              </tr>';
    }
}
curl_close($curl);
?>
</body>
</html>
