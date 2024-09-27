<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //inicializamos dos variables
    $numeroFibonacci=1;
    $anterior=0;
    //mientras sea menor o igual que 10000 lo hara
    while($numeroFibonacci<=10000){
        // hacemo que tome el valor de la suma
    $numeroFibonacci+=$anterior;
    // ahora hacemos que el anterior tome 
    //el valor actual de la suma restando el valor del anterior
    $anterior=$numeroFibonacci-$anterior;
    // se muestra por pantalla
    echo "$numeroFibonacci <br>";
    }
    ?>
</body>
</html>