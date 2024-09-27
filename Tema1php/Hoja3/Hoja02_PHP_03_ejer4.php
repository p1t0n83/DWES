<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $fecha1=date_create('2020-1-23');
     $fecha2=date_create('2022-1-23');
     $dias=date_diff($fecha1,$fecha2);
     echo "$dias->days   días transcurridos";
    ?>
</body>
</html>