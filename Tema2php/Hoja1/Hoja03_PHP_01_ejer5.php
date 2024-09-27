<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // - Visualizar aquellos que cumplen que la suma de sus dígitos es igual al producto de los
    // mismos. Por ejemplo 123, donde 1*2*3 = 1+2+3
 $numero=1233;
 $aux=$numero;

 $suma=0;
 $producto=1;

 while($aux > 0){
    //se almacena el resto, que sera el primer digito,3
    $digito = $aux%10;
    //se almacena la division, que sera 12,al usar floor saldra entero
    $aux = floor($aux/10);
    //sumamos el digito
    $suma+=$digito;
    //multiplicamos el digito, para eso pusimos 1
    $producto *= $digito;
    // ahora se repetira otra vez el while para extraer el 2 y luego el 1
 }

 echo $suma == $producto ? "Los números coinciden" : "Los números no coinciden"
    ?>
</body>
</html>