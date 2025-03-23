<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <?php
        require_once "ejercicio1.php";
        $circulo=new Circulo(9);
        $circulo->__get('radio');
        $circulo->__set('radio',10);
        $circulo->__get('radio');
    ?>

    <h1>Ejercicio 2</h1>
    <?php
    require_once "ejercicio2.php";
    $coche=new Coche("7625 AHR",56);
    $coche->acelerar(200);
    $coche->toString();
    $coche->acelerar(10);
    $coche->toString();
    $coche->frena(45);
    $coche->toString();
    ?>

    <h1>Ejercicio 3</h1>
    <?php
     require_once "ejercicio3.php";
     $monederos=[new Monedero(50),new Monedero(10)];
     $monedero=new Monedero(30);
     echo Monedero::$numero_monederos;
    ?>
</body>
</html>