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
    $date = date_format(new DateTime(), 'Y');
    $dia = date_format(new DateTime(), 'D');
    $diaNumero = date_format(new DateTime(), 'd');
    $mes = date_format(new DateTime(), 'M');
    $diaFormateado;
    $mesFormateado;
    switch ($dia) {
        case "Sun": {
                $diaFormateado = "Domingo";
                break;
            }
        case "Mon": {
                $diaFormateado = "Lunes";
                break;
            }
        case "Tue": {
                $diaFormateado = "Martes";
                break;
            }
        case "Wed": {
                $diaFormateado = "Miercoles";
                break;
            }
        case "Thu": {
                $diaFormateado = "Jueves";
                break;
            }
        case "Fri": {
                $diaFormateado = "Viernes";
                break;
            }
        case "Sat": {
                $diaFormateado = "Sabado";
                break;
            }
    }
    switch ($mes) {
        case "Jan": {
                $mesFormateado = "Enero";
                break;
            }
        case "Feb": {
                $mesFormateado = "Febrero";
                break;
            }
        case "Mar": {
                $mesFormateado = "Marzo";
                break;
            }
        case "Apr": {
                $mesFormateado = "Abril";
                break;
            }
        case "May": {
                $mesFormateado = "Mayo";
                break;
            }
        case "Jun": {
                $mesFormateado = "Junio";
                break;
            }
        case "Jul": {
                $mesFormateado = "Julio";
                break;
            }
        case "Aug": {
                $mesFormateado = "Agosto";
                break;
            }
        case "Sep": {
                $mesFormateado = "Septiembre";
                break;
            }
        case "Oct": {
                $mesFormateado = "Octubre";
                break;
            }
        case "Nov": {
                $mesFormateado = "Noviembre";
                break;
            }
        case "Dec": {
                $mesFormateado = "Diciembre";
                break;
            }
    }
    echo ($diaFormateado . "," . $diaNumero . " de " . $mesFormateado . " de " . $date);

    ?>

    <h1>Ejercicio 2</h1>

    <?php
    $suma = 0;
    $contador = 10;
    while ($contador < 100) {
        if ($contador % 2 == 0) {
            $suma += $contador;
        }
        $contador++;
    }
    echo ($suma);
    ?>

    <h1>Ejercicio 3</h1>

    <?php
    $numero = 131;
    $numero1 = intval($numero % 10); //1
    $resta = intval($numero / 10); //13
    $numero2 = intval($resta / 10); //1
    if ($numero1 == $numero2) {
        echo ("el numero " . $numero . " es capicua");
    } else {
        echo ("el numero " . $numero . " no es capicua");
    }
    ?>

    <h1>Ejercicio 4</h1>

    <?php
    for ($numero = 100; $numero <= 999; $numero++) {
        $numero1 = intval($numero % 10);
        $resta = intval($numero / 10);
        $numero2 = intval($resta / 10);
        if ($numero1 == $numero2) {
            echo ("el numero " . $numero . " es capicua <br>");
        }
    }
    ?>

    <h1>Ejercicio 5</h1>

    <?php
    for ($numero = 100; $numero <= 999; $numero++) {
        $numero1 = intval($numero % 10); //3
        $resto = intval($numero / 10); //12
        $numero2 = intval($resto % 10); //2
        $numero3 = intval($resto / 10); //1
        $suma = $numero1 + $numero2 + $numero3;
        $multiplicacion = $numero1 * $numero2 * $numero3;
        if ($suma == $multiplicacion) {
            echo ("el numero " . $numero . " cumple la condicion <br>");
        }
    }
    ?>

    <h1>Ejercicio 6</h1>
    <?php
    $numero1 = 0;
    $numero2 = 1;
    $numeros = "";

    do {
        $numeros .= $numero1 . " ";
        $numeroTemporal = $numero2;
        $numero2 += $numero1;
        $numero1 = $numeroTemporal;
    } while ($numero1 < 100);

    echo $numeros;
    ?>

    <h1>Ejercicio 7</h1>
     
    <?php
    $arriba=1;
    $abajo=2;
    for($numero=0;$numero<10;$numero++){
     echo($arriba."/".$abajo." ");
     $arriba*=2;
     $abajo*=2;
    }
    ?>

    <h1>Ejercicio 8</h1>

    <?php
    $numero=4;
    $factorial=1;
    for($i=1;$i<=$numero;$i++){
     $factorial*=$i;
    }
    echo("factorial de ".$numero." = ".$factorial);
    ?>

    <h1>Ejercicio 9</h1>

    <?php
    $distancia=900;
    $dias=8;
    $precio=0;
    if($dias>7 && $distancia>800){
         $precio=($distancia*2.5)*0.7;
    }else{
        $precio=($distancia*2.5);
    }
    echo("Precio del billete=". $precio);
    ?>

    <h1>Ejercicio 10</h1>
    <?php
    $numero=9;
    $primo=true;

    for($i=2;$i<$numero;$i++){
        if($numero%$i==0){
            $primo=false;
        }
    }
    if($primo){
        echo("El numero ".$numero." es primo");
    }else{
        echo("El numero ".$numero." no es primo");
    }

    ?>

    <h1>Ejercicio 11</h1>

    <?php
   $cosas=[];
    for($veces=10;$veces>0;$veces--){
        $linea="";
          for($numero=$veces;$numero>0;$numero--){
           $linea.=$numero." ";
          } 
          $cosas[$veces - 1] = $linea;   
    }
    foreach ($cosas as $cosa) {
        echo $cosa . "<br>";
    }
    ?>

    <h1>Ejercicio 12</h1>

    <?php
    for($i=3;$i<999;$i++){
        $primo=true;

        for($y=2;$y<$i;$y++){
            if($i%$y==0){
                $primo=false;
            }
        }
        if($primo){
            echo("El numero ".$i." es primo <br>");
        }
    }
    ?>
</body>

</html>