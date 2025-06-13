<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <label for="id">
            <input type="number" placeholder="id" name="id" id="id" required>
        </label>
        <button type="submit">Ver</button>
        <form>
            <?php
            if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
                $id=$_GET['id'];
                $url_servicio="http://localhost:8001/api/productos/".$id;
                $curl=curl_init($url_servicio);

                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"GET");
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                $respuesta_curl=curl_exec($curl);
               
                $respuesta = json_decode($respuesta_curl);
            if ($respuesta && $respuesta->status != "error" && isset($respuesta->data)) {
               $producto = $respuesta->data[0];
               echo '<p>Producto: ' . $producto->nombre . '</p>';
               echo '<p>Precio: ' . $producto->precio . '</p>';
               echo '<p>Descripcion: ' . $producto->descripcion . '</p>';

            } else {
               echo '<br><p">No se pudo obtener el producto.</p>';
            }
            }
            ?>
</body>
</html>