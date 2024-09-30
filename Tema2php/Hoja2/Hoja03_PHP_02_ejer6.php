<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     function validarFecha($cadena){
        $formato='d-m-y';

        //crear objeto DateTime
        $fecha=DateTime::createFromFormat($formato,$cadena);
   
        return $fecha && $fecha->format($formato)=== $cadena;
    }
   if(validarFecha("20-09-2024")){
    echo 'Fecha valida';
   }else{
    print 'Fecha invalida';
   }
    ?>
</body>
</html>