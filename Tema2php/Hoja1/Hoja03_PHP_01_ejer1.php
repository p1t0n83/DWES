<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema2php/Hoja03_PHP_01_ejer1.php</title>
</head>
<body>
    <?php
    
    // pongo la zona horaria de españa no vaya a ser....
   date_default_timezone_set('Europe/Madrid');
    $dia=date("D");
    $mes=date("m");
    $anio= date("Y");
    $diaTexto;
    // dependiendo del valor de mes le asignara el mes correspondiente.
   $mes = [
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre"
];

// Asigna el nombre del mes según el valor de $mes
$mes = $meses[$mes] ?? "Mes desconocido"; // Si $mes no existe,

    // ya que la variable dia recoje el dia en ingles lo paso al español.
    $dias = [
    "Mon" => "Lunes",
    "Tue" => "Martes",
    "Wed" => "Miércoles",
    "Thu" => "Jueves",
    "Fri" => "Viernes",
    "Sat" => "Sábado",
    "Sun" => "Domingo"
];

// Asigna el nombre del día según el valor de $dia
$diaTexto = $dias[$dia] ?? "Día desconocido"; // Si $dia no existe, muestra "Día desconocido"

    // ahora cambio el valor de dia al numero poniendo la d en minuscula.
    $dia=date("d");
    
    echo "$diaTexto ,$dia de $mes de $anio";

   /*
    setlocale(LC_TIME,'es_ES.UTF-8','spanish');
    //$fecha=strftime("%A, %d de %B de %Y");
    $fecha = new DateTime();
    $fecha->setTimezone(new DateTimeZone('UTF+1'));
    echo $fecha->format("l, d  M Y");
    */
    

    ?>
</body>
</html>