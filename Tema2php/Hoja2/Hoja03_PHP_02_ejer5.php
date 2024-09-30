<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function numericos($numero){

     function capicua($numero){
      $inverso=0;
      $numero=floor($numero);
      $aux=$numero;
      while($aux!=0){
          $resto=$aux%10;
          $inverso=$inverso*10+$resto;
          $aux=(int)($aux/10);
      }
      if($numero==$inverso)
         echo "El numero $numero es capicúa<br />";
      else
         echo "El numero $numero NO es capicúa<br />";
     }

     function numeroDigitos($numero){
        $numero=floor($numero);
        $aux=$numero;
        $contador=0;
        while($aux > 0){
            // usando de base el ejercicio de suma=multiplicacion
            //se almacena la division
            $aux = floor($aux/10);           
            // ahora se repetira otra vez el while para saber las cifras
            $contador++;
         }
         echo "El numero $numero tiene $contador digitos <br/>";
     }
     function redondeado($numero){
        $redondeado=round($numero);
        echo "El numero $numero redondeado es $redondeado <br/>";
     }
     capicua($numero);
     numeroDigitos($numero);
     redondeado($numero);
}
$numero=161.89;
numericos($numero);
    ?>
</body>
</html>