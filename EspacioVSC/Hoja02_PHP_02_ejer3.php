<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $operador1=13;
    $operador2=4;
    $resultado=$operador1-$operador2;
    echo "<p>El resultado de restar $operador1-$operador2 es $resultado</p>";
    $resultado=$operador1+$operador2;  
    echo "<p>El resultado de sumar $operador1+$operador2 es $resultado</p>";
    $resultado=$operador1*$operador2;
    echo "<p>El resultado de multiplicar $operador1*$operador2 es $resultado</p>";
    $resultado=$operador1/$operador2;
    echo "<p>El resultado de dividir $operador1/$operador2 es $resultado</p>";
    $resultado=$operador1%$operador2;
    echo "<p>El resto de la division de $operador1%$operador2 es $resultado</p>";
    ?>
</body>
</html>