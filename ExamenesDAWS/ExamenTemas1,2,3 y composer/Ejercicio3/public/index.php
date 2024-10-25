
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="" method="get">
      <h1>Generar Datos Falsos con Faker</h1>
    <label for="nombres">Numero de Nombres:</label>
    <input type="number" name="nombres" id="nombres" required>  <br>
    <label for="emails">Numero de Emails:</label>
    <input type="number" name="emails" id="emails" required><br>
    <label for="telefonos">Numero de Telefonos Moviles:</label>
    <input type="number" name="telefonos" id="telefonos" required><br>
    <button type="submit" value="Generar">Generar</button>
    </form>


<?php
   
    require_once '../vendor/autoload.php';
    $faker = libreria\Faker\Generate::create();
    echo"<h2>Resultados</h2>";
    $numeroNombres=$_GET['nombres'];
    $numeroemails=$_GET['emails'];
    $numeroTelefonos=$_GET['telefonos'];
    echo"<h3>Nombres</h3>";
    for ($i = 0; $i < $numeroNombres; $i++) {
        echo $faker->name() . "\n";
        }
    echo"<h3>Emails</h3>";
    for ($i = 0; $i < $numeroemails; $i++) {
        echo $faker->email() . "\n";
        }
    echo"<h3>Telefonos</h3>";
    for ($i = 0; $i < $numeroTelefonos; $i++) {
        echo $faker->phone() . "\n";
        }
    
    ?>
   
</body>
</html>