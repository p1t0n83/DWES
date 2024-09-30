<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $capital=1000;
    $redito=0.05;
    $tiempo=3;
    $capitalActual=$capital;
    // si no pongo la & no se actuializa fuera el capitalActual
    function interesSimple($capital,$redito,$tiempo,&$capitalActual){
      $interesSimple=$capital*$redito*$tiempo;
      echo "Interes simple: $interesSimple <br/>";
      $capitalActual+=$interesSimple;
    }
    interesSimple($capital,$redito,$tiempo,$capitalActual);


    function interesCompuesto($capital,$redito,$tiempo,&$capitalActual){
 $montonFinal = $capital * pow((1 + $redito), $tiempo);
 // El interés compuesto es la diferencia entre el monton final y el capital inicial
 $interesCompuesto = $montonFinal - $capital;
 echo "Interés compuesto: $interesCompuesto <br/>";
 // Actualizamos el capital actual con el monto final (no sumamos, lo actualizamos)
 $capitalActual = $montonFinal;
    }
    interesCompuesto($capital,$redito,$tiempo,$capitalActual);
    ?>
</body>
</html>