<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $distanciakm=1200;
    $preciokm=2.5;
    $dias=5;
    $precioFinal;
    // si los dos campos superan eso,
    // multiplicamos el precio * 0.7 que seria el 70%
    // del precio base
    if($distanciakm>800 && $dias>7){
         $precioFinal=floatval($distanciakm*$preciokm*0.7);
    }else{
         $precioFinal=floatval($distanciakm*$preciokm);
    }
    echo "El precio final del billete es de: $precioFinal";
    ?>
</body>
</html>