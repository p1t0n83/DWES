<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //funcion para cargar un array con numeros aleatorios
    function cargar(array $array){
      
     for ($i=0; $i < 10; $i++) { 
        $array[$i]=random_int(0,1000);
     }
     return $array;
    }
    $primero=array();
    $segundo=array();
    $primero=cargar($primero);
    $segundo=cargar($segundo);      
    
    //ordenar un array con la funcion asort,pasamos el array por referencia para que se guarden los cambios
    function ordenar(array &$array):void{
    asort($array);
    //Reindexa el array,porque sino no me sale ordenado por valor
    $array = array_values($array);
    }

    ordenar($primero);
    ordenar($segundo);
    
    //con array_merge fusionamos 2 arrays
    function fusionar(array $primero,array $segundo): array{
    return array_merge($primero, $segundo);
    }

    $fusion=fusionar($primero,$segundo);
    ordenar($fusion);
   // Recorrer el array con las claves originales
foreach ($fusion as $valor) {
    echo $valor . "<br>";
}
    ?>
</body>
</html>