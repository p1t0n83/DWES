<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema2php/Hoja03_PHP_01_ejer2.php</title>
</head>
<body>
    <?php
    $suma=0;
    for($num=10;$num<=100;$num++){
    if($num%2==0){
        $suma+=$num;
    }
    }
    echo "la suma de todos los numeros naturales del 10 al 100: $suma"
    ?>
</body>
</html>