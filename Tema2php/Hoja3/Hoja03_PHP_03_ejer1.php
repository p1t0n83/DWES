<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
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
    

    function ordenar(array $array):void{
    asort($array);

    }

    ordenar($primero);
    ordenar($segundo);

    function fusionar(array $primero,array $segundo): array{
    return array_merge($primero, $segundo);
    }

    $fusion=fusionar($primero,$segundo);
    
    ?>
</body>
</html>