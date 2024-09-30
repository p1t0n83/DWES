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
        $posicion=strpos($cadena,"algas");
    echo 'Posicion de la palabra "algas":'.$posicion. '<br/>';
    
    $cadena=str_replace("realmente", "muy", $cadena);
    echo $cadena.'<br/>';

     if(strpos($cadena,"anacardo")==false){
     echo "no existe la palabra anacardo <br/>";
     }else{
     echo "Existe la palabra anacardo <br/>";
     }

     $cadenaInvertida = strrev($cadena);
     echo $cadenaInvertida.'<br/>';

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