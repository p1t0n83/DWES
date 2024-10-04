<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('Traits\Mensaje.php');  
    include_once('Clases\Aeropuerto.php');
    include_once('Clases\ElementoVolador.php');
    include_once('Clases\Avion.php');
    include_once('Clases\Helicoptero.php'); 
    
    include_once('Interfaces\Volador.php');
    
    use MiProyecto\Clases\Aeropuerto;
    use MiProyecto\Clases\Avion;
    use MiProyecto\Clases\Helicoptero;
    use MiProyecto\Traits\Mensaje;
    //crea aeropuerto
    include("Hoja03_PHP_07_ejer1.php");
    $aeropuerto = new Aeropuerto();

    // Crear tres aviones
    $avion1 = new Avion("Boeing 777", 2, 4, 0, "Iberia", 300, new DateTime('2020-05-20'), 13000);
    $avion2 = new Avion("Airbus A320", 2, 2, 0, "Vueling", 280, new DateTime('2018-11-10'), 12000);
    $avion3 = new Avion("Cessna 007", 1, 1, 0, "AirEuropa", 180, new DateTime('2019-03-15'), 4000);

    // Crear tres helicópteros
    $helicoptero1 = new Helicoptero("Helicóptero Apache", 0, 1, 0, 150, "Militar", 4);
    $helicoptero2 = new Helicoptero("Helicóptero Bell", 0, 1, 0, 120, "Privado", 2);
    $helicoptero3 = new Helicoptero("Helicóptero Robinson", 0, 1, 0, 100, "Rescate", 3);

    // Introducir los objetos creados en el aeropuerto
    $aeropuerto->insertar($avion1);
    $aeropuerto->insertar($avion2);
    $aeropuerto->insertar($avion3);
    $aeropuerto->insertar($helicoptero1);
    $aeropuerto->insertar($helicoptero2);
    $aeropuerto->insertar($helicoptero3);
    // trait ahora en el programa principal
    $aeropuerto->mostrarMensaje("Arriba España Cojones<br/>");

    ?>

    <?php
    include("Hoja03_PHP_07_ejer2.php");
    $empleado = new Empleado("Iker Garcia Iturri", 19, "Zurita Barrio San Marin N8 Bajo 1 Puerta D", "001", 1900);
    $empleado->mostrarInformacionPersonal($empleado->__get('nombre'), $empleado->__get('edad'), $empleado->__get('direccion'));
    $empleado->mostrarInformacionLaboral($empleado->__get('codigoEmpleado'), $empleado->__get('salario'));
    ?>
</body>

</html>