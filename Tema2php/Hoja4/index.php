<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    
    //con esto podemos usar las clases que tengamos en esta hoja
    include("Hoja03_PHP_04_ejer1.php");

    //creamos un objeto de la clase circulo
    //ponemos 5 para inicializar el radio
    $miCirculo=new Circulo(5);

     // Usamos los métodos mágicos __get y __set
     echo "El radio inicial del círculo es: " . $miCirculo->__get('radio') . "<br/>";

     // Cambiamos el valor del radio usando el método mágico __set
     $miCirculo->__set('radio',10);
     echo "El nuevo radio del círculo es: " . $miCirculo->__get('radio') . "<br/>";
     
?>
<?php
     
    include("Hoja03_PHP_04_ejer2.php");

    // Crear un objeto de la clase Coche
    $coche1 = new Coche("1234ABC", 50);
    echo "<h2>Informacion del coche:</h2>";
    // Mostrar información inicial del coche
    $coche1->mostrar();

    // Acelerar el coche
     echo "<h2>Después de acelerar:</h2>";
    $coche1->acelerar(30);
   
    $coche1->mostrar();

    // Frenar el coche
    echo "<h2>Después de frenar:</h2>";
    $coche1->desacelerar(60);
    
    $coche1->mostrar();
    
    ?>
<?php
    include("Hoja03_PHP_04_ejer3.php");
    
      // Crear instancias de la clase Monedero
      $monedero1 = new Monedero(100); // Crear un monedero con 100 unidades
    
      // Consultar el dinero en el monedero 1
      echo "<h3>Monedero:</h3>";
      $monedero1->consultarDinero();
  
      // Meter dinero en el monedero 1
      $monedero1->meterDinero(20);
      $monedero1->consultarDinero();
  
      // Sacar dinero del monedero 1
      $monedero1->sacarDinero(50);
      $monedero1->consultarDinero();
  
      // Intentar sacar más dinero del que tiene
      $monedero1->sacarDinero(100);
      $monedero1->consultarDinero();
  
      //borramos el monedero con el metodo que cree
      Monedero::borrarMonedero($monedero1);
     
    ?>
</body>

</html>