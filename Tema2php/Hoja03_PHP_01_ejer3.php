<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // a ver si no me lio xd
    $numero='22322';
    //con strlen podemos ver la longitud de un string,hice el numero String porque es mas facil trabajar con el así
    $longitud=strlen($numero);
    //creamos una variable para almacenar si es capicua o no
    $capicua=true;
    // hacemos un for que llegue hasta la mitad
    for($i=0;$i<=$longitud/2;$i++){
        // hacemos dos variables, una que tome el valor de la posicion que va aumentando
        //y la otra la contraria
        $numero1=$numero[$i];
        //para ello sacamos la longitud del numnreo,le restamos 1 y le restamos la posicion del primer valor
        $numero2=$numero[strlen($numero)-1-$i];
        //con el if comprobamos si son iguales los dos numeros y si no lo son capicua toma un valor falso
    if($numero1!=$numero2){
    $capicua=false;
    }
    }
    //un ternario,usalos cabron
    echo $capicua ? 'Sí, es capicúa' : 'No, no es capicúa';
    ?>
</body>
</html>