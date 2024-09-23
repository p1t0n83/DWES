<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombre="Juan";
    //si quiero poner comillas dentro de un echo o un print tengo que ponerlo asi \"---\"
    echo "Información de la variable \"nombre\": ";
    var_dump($nombre);
    echo "<br/><p>Contenido de la variable:$nombre</p>";
    $nombre=null;
    echo "Después de asignarle un valor nulo:";
    var_dump($nombre);
      ?>
</body>
</html>