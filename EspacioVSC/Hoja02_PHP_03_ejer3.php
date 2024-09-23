<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $dia = 30;
    $mes = 2;
    $anio = 2023;
    // Comprobar si la fecha es válida usando checkdate
    if (checkdate($mes, $dia, $anio)) {
        echo "La fecha $dia/$mes/$anio es válida.";
    } else {
        echo "La fecha $dia/$mes/$anio no es válida.";
    }
?>

</body>
</html>