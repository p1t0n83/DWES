<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $variable1=5;
    $variable2=6;
    echo "<p>Sin ser cambiados el primer numero es $variable1 y el segundo $variable2</p>";
    $cambiador=$variable1;
    $variable1=$variable2;
    $variable2=$cambiador;
    echo"Hemos cambiado los valores el primer numero es $variable1 y el segundo $variable2";

    ?>
</body>
</html>