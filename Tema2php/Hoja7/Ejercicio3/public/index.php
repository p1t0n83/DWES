<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
   require_once __DIR__ . '/../vendor/autoload.php';
    use App\Clases\Aeropuerto; 
    use App\Clases\Avion;
    use App\Clases\Helicoptero;

    //crea aeropuerto
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


      // Probar métodos de Aeropuerto
      echo "<h2>Búsqueda de vehículo:</h2>";
      $aeropuerto->buscar("Boeing 777");
      echo "<br/>";
  
      echo "<h2>Listar aviones de la compañía 'Iberia':</h2>";
      $aeropuerto->listarCompania("Iberia");
      echo "<br/>";
  
      echo "<h2>Listar helicópteros con 4 rotores:</h2>";

      $aeropuerto->rotores(4);
    echo "<br/>";

    echo "<h2>Despegar el avión 'Cessna 007':</h2>";
    $despegue = $aeropuerto->despegar("Cessna 007", 1000, 180);
    if ($despegue !== null) {
        echo "Despegue exitoso para: " . $despegue->__get('nombre') . "<br/>";
    } else {
        echo "Error al despegar el vehículo.<br/>";
    }
    ?>

    
</body>

</html>