<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dinero=67;
    $billetes10=intval($dinero / 10);//intval me comvierte a integer el calculo
    echo"<p>Cantidad de billetes de 10=$billetes10</p>";
    //el resto de los billetes de 10
    $resto = $dinero % 10;
    //no queremos decimales asi que lo mismo
    $billetes5=intval($resto/5);
    echo"<p>Cantidad de billetes de 5=$billetes5</p>";
    //otro pequeño calculo para sacar el resto de los billetes de 5
    $monedas=$resto%5;
    echo"<p>Cantidad de monedas de 1=$monedas</p>";
    ?>
</body>
</html>