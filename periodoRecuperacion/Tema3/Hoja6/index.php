<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'interfaces/Volador.php';
    require_once 'clases/ElementoVolador.php';
    require_once 'clases/Avion.php';
    require_once 'clases/Helicoptero.php';
    require_once 'clases/Aeropuerto.php';    
     use Clases\Aeropuerto;
     use Clases\ElementoVolador;
     use Clases\Avion;
     use Clases\Helicoptero;
     $avion=new Avion("A-10 Thunderboldt II ",2,2,"Compania","10/12/2004",5000);
     $helicoptero=new Helicoptero("Apache",2,1,"",4);
     $aeropuerto=new Aeropuerto();
     $aeropuerto->insertar($avion);
     $aeropuerto->insertar($helicoptero);
     echo $aeropuerto->buscar("Apaache");
     echo $helicoptero->mostrarInformacion();
     $aeropuerto->despegar("A-10 Thunderboldt II ",3000,200);
    ?>
</body>
</html>