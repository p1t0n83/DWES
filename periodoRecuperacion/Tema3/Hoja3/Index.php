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
    $array1=[1,2,3,4,5,6,7,8,9,10];
    $array2=[11,12,13,14,15,16,17,18,19,20];
    $mezclados=array_merge($array1,$array2);
    for($i=0;$i<count($mezclados);$i++){
      echo($mezclados[$i]." ");
    }
    echo("<br>");
    
    for ($j = 0; $j < count($mezclados) - 1; $j++) {
        for ($i = 0; $i < count($mezclados) - 1 - $j; $i++) {
            if ($mezclados[$i] <$mezclados[$i + 1]) {
                $t = $mezclados[$i];
                $mezclados[$i] = $mezclados[$i + 1];
                $mezclados[$i + 1] = $t;
            }
        }
    }
    

    for($i=0;$i<count($mezclados);$i++){
        echo($mezclados[$i]." ");
      }
      echo("<br>");
    ?>

    <h1>Ejercicio 2</h1>
    <?php
    
    ?>
</body>
</html>