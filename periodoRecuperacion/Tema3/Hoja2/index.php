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
    include "Funciones.php";
    print fechaFormateada();
    ?>

    <h1>Ejercicio 2</h1>
    <?php
     print suma(1,4);
    ?>

    <h1>Ejercicio 3</h1>
    <?php
    print imprimirMensaje("Que ganas de comerme un cachopo");
    ?>

    <h1>Ejercicio 4</h1>
    <?php
    $resultado_simple = calcularInteresSimple(1000, 5, 3);
    $resultado_compuesto = calcularInteresCompuesto(1000, 5, 3);
    
    echo "Interés Simple<br>";
    echo "Interés: " . $resultado_simple['interes'] . "<br>";
    echo "Monto Total: " . $resultado_simple['monto'] . "<br><br>";
    
    echo "Interés Compuesto<br>";
    echo "Interés: " . $resultado_compuesto['interes'] . "<br>";
    echo "Monto Total: " . $resultado_compuesto['monto'] . "<br>";
    
    ?>

    <h1>Ejercicio 5</h1>
    <?php
    print capicua(102);
    print redondear(10.4);
    print cuentaDigitos(123445);
    ?>

    <h1>Ejercicio 6</h1>
    <?php
    print fechaCorrecta("10/12/2024");
    ?>

    <h1>Ejercicio 7</h1>
    <?php
    print validarCuentaCorriente('2100-2527-84-1234567890','2100','2527','84','1234567890');
    ?>

    <h1>Ejercicio 8</h1>
    <?php
    $variable="comer algas es realmente sano";
    $posicion=strpos($variable,"algas");
    echo("La palabra algas se encuentra en la posicion ". $posicion."<br>");
    $variable=str_replace('realmente','muy',$variable);
    echo($variable."<br>");
    if (strpos($variable, "anacardos") !== false) {
        echo "Se encontró <br>";
    } else {
        echo "No se encontró <br>";
    }
    $textoInvertido = strrev($variable);
    echo($textoInvertido."<br>");
    $encontradas=0;
    for($i=0;$i<strlen($variable);$i++){
        if(substr($variable,$i,1)=="e"){
            $encontradas++;
        }
    }

    echo("Se encontraron ".$encontradas." e");
    ?> 
</body>

</html>