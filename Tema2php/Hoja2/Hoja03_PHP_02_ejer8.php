<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function trabajoCadenas($cadena){
        //strpos nos permite buscar una cadena en especifico dentro de otra cadena
        $posicion=strpos($cadena,"algas");
    echo 'Posicion de la palabra "algas":'.$posicion. '<br/>';


    //str_replace nos permite sustituir una parte de una cadena por otra
    $cadena=str_replace("realmente", "muy",$cadena);
    echo $cadena.'<br/>';


     //lo mismo de antes,buscamos si esta anacardo
     if(strpos($cadena,"anacardo")===false){
     echo "no existe la palabra anacardo <br/>";
     }else{
     echo "Existe la palabra anacardo <br/>";
     }


       //strrev nos permite invertir una cadena
     $cadenaInvertida = strrev($cadena);
     echo $cadenaInvertida.'<br/>';


    //miramos posicion a posicion de la cadena mediante un for para encontrar cuantas 'e' ahí
    $contador=0;
    for ($i = 0; $i < strlen($cadena); $i++) {     
        if ($cadena[$i] === 'e') {
            $contador++;
        }
    }


    echo "La cantidad de 'e' en la cadena es: $contador <br/>";
    }
    

    trabajoCadenas('Comer algas es realmente sano');


    ?>
</body>
</html>