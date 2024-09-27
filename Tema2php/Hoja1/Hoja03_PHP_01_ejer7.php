<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $numero1=1;
     $numero2=2;
     $contador=0;
     //muy simple, un contador hasta 10, al primer numero le sumamos 1 cada vez y al segundo lo multiplicamos por 2
     while($contador<10){
        echo "$numero1/$numero2 ";
        $contador++;
        $numero1++;
        $numero2*=2;
     }
    ?>
</body>
</html>