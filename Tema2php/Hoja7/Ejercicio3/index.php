<?php
// los namespace tienen que ir en primera linea
namespace MiProyecto\Index;


use DateTime; // Clase DateTime

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Aeropuerto</title>
</head>

<body>
    <?php
      
    //1.crea aeropuerto
    $aeropuerto = new Aeropuerto();

    // 2.Crear tres aviones
    $avion1 = new Avion("Boeing 747", 2, 4, 0, "Iberia", 300, new DateTime("2020-05-20"), 13000);
    $avion2 = new Avion("Airbus A320", 2, 2, 0, "Vueling", 280, new DateTime("2018-11-10"), 12000);
    $avion3 = new Avion("Cessna 172", 1, 1, 0, "AirEuropa", 180, new DateTime("2019-03-15"), 4000);

    // 2.Crear tres helicópteros
    $helicoptero1 = new Helicoptero("Helicóptero Apache", 0, 1, 0, 150, "Militar", 4);
    $helicoptero2 = new Helicoptero("Helicóptero Bell", 0, 1, 0, 120, "Privado", 2);
    $helicoptero3 = new Helicoptero("Helicóptero Robinson", 0, 1, 0, 100, "Rescate", 3);

    // 3.Introducir los objetos creados en el aeropuerto
    $aeropuerto->insertar($avion1);
    $aeropuerto->insertar($avion2);
    $aeropuerto->insertar($avion3);
    $aeropuerto->insertar($helicoptero1);
    $aeropuerto->insertar($helicoptero2);
    $aeropuerto->insertar($helicoptero3);

    echo "<h2>Prueba del método buscar:</h2>";

    //4. Probar el método buscar (primero un elemento que existe)
    echo "<h3>Buscar elemento que existe (Boeing 747):</h3>";
    $aeropuerto->buscar("Boeing 747");

    // 4.Probar el método buscar (elemento que no existe)
    echo "<h3>Buscar elemento que no existe (Avión Fantasma):</h3>";
    $aeropuerto->buscar("Avión Fantasma");

    echo "<h2>Prueba del método listarCompania:</h2>";

    // 5.Probar el método listarCompania (compañía que existe)
    echo "<h3>Listar aviones de la compañía Iberia:</h3>";
    $aeropuerto->listarCompania("Iberia");

    // 5.Probar el método listarCompania (compañía que no existe)
    echo "<h3>Listar aviones de la compañía Fantasma Airlines:</h3>";
    $aeropuerto->listarCompania("Fantasma Airlines");

    echo "<h2>Prueba del método rotores:</h2>";

    // 6.Probar el método rotores (helicóptero con un número de rotores que existe)
    echo "<h3>Helicópteros con 4 rotores:</h3>";
    $aeropuerto->rotores(4);

    // 6.Probar el método rotores (número de rotores que no existe)
    echo "<h3>Helicópteros con 6 rotores (no existe):</h3>";
    $aeropuerto->rotores(6);

    echo "<h2>Prueba del método despegar (Avión):</h2>";

    // 7.Realizar el despegue de un avión
    echo "<h3>Despegue del avión Boeing 747 a 10,000 metros y 800 km/h:</h3>";
    $avionDespegado = $aeropuerto->despegar("Boeing 747", 10000, 800);

    // 7.Mostrar si el avión está volando
    if ($avionDespegado && $avionDespegado->volando()) {
        echo "<h3>El avión está volando.</h3><br>";
        $avionDespegado->mostrarInformacion();
    } else {
        echo "<h3>El avión no pudo despegar.</h3><br>";
    }

    echo "<h2>Prueba del método despegar (Helicóptero):</h2>";

    // 8.Realizar el despegue de un helicóptero
    echo "<h3>Despegue del helicóptero Apache a 400 metros y 200 km/h:</h3>";
    $helicopteroDespegado = $aeropuerto->despegar("Helicóptero Apache", 400, 200);

    // 8.Mostrar si el helicóptero está volando
    if ($helicopteroDespegado && $helicopteroDespegado->volando()) {
        echo "<h3>El helicóptero está volando.</h3><br>";
        $helicopteroDespegado->mostrarInformacion();
    } else {
        echo "<h3>El helicóptero no pudo despegar.</h3><br>";
    }

    ?>
</body>

</html>