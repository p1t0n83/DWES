<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $fecha = date_create();
    $diasarestar = 5;
    // date sub nos permite restar fechas
    date_sub($fecha, date_interval_create_from_date_string("$diasarestar days"));

    // Dar formato a la nueva fecha en día-mes-año usando date_format
    echo "Fecha después de restar $diasarestar días: " . date_format($fecha, 'd-m-Y');
?>


</body>
</html>