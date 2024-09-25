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
    if($mes==1) {
        $mes="Enero";
    }else if($mes==2){
        $mes="Febrero";
    }else if($mes==3){
        $mes="Marzo";
    }else if($mes==4){
        $mes="Abril";
    }else if($mes==5){
        $mes="Mayo";
    }else if($mes==6){
        $mes="Junio";
    }else if($mes==7){
        $mes="Julio";
    }else if($mes==8){
        $mes="Agosto";
    }else if($mes==9){
        $mes="Septiembre";
    }else if($mex==10){
        $mes="Octubre";
    }else if($mex==11){
        $mes="Noviembre";
    }else{
        $mes="Diciembre";
    }
    // ya que la variable dia recoje el dia en ingles lo paso al español.
    if($dia=="Mon") {
        $diaTexto="Lunes";
    }else if($dia=="Tue"){
        $diaTexto="Martes";
    }else if($dia=="Wed"){
        $diaTexto="Miercoles";
    }else if($dia=="Thu"){
        $diaTexto="Jueves";
    }else if($dia=="Fri"){
        $diaTexto="Viernes";
    }else if($dia=="Sat"){
        $diaTexto="Sabado";
    }else{
        $diaTexto="Domingo";
    }
    // ahora cambio el valor de dia al numero poniendo la d en minuscula.
    $dia=date("d");
    
    echo "$diaTexto ,$dia de $mes de $anio";
    ?>
</body>
</html>