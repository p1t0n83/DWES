<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function fechaEspaniol(){
        $fecha= date("d-m-Y");
        setlocale(LC_TIME,'es_ES.UTF-8','spanish');
        $fecha=strftime("%A, %d de %B de %Y");
        $fecha = new DateTime();
        $fecha->setTimezone(new DateTimeZone('UTF+1'));
        echo $fecha->format("l, d  M Y");
    }
    
    fechaEspaniol();
    ?>
</body>
</html>