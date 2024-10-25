
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="" method="post">
      <h1>Generar Datos Falsos con Faker</h1>
    <label for="nombres">Numero de Nombres:</label>
    <input type="number" name="nombres" id="nombres" value=<?php echo( isset($_POST['nombres'])?$_POST['nombres']:0);?> required>  <br>
    <label for="emails">Numero de Emails:</label>
    <input type="number" name="emails" id="emails"  value=<?php echo( isset($_POST['emails'])?$_POST['emails']:0);?> required><br>
    <label for="telefonos">Numero de Telefonos Moviles:</label>
    <input type="number" name="telefonos" id="telefonos" value=<?php echo( isset($_POST['telefonos'])?$_POST['telefonos']:0);?> required><br>
    <button type="submit" value="Generar">Generar</button>
    </form>
    
<?php
   
    require_once '../vendor/autoload.php';
    $faker = Faker\Factory::Create('es_ES');
    echo"<h2>Resultados</h2>";
    $numeroNombres=$_POST['nombres'];
    $numeroemails=$_POST['emails'];
    $numeroTelefonos=$_POST['telefonos'];
    echo"<h3>Nombres</h3>";
    for ($i = 0; $i < $numeroNombres; $i++) {
        echo $faker->name() . "<br/>";
        }
    echo"<h3>Emails</h3>";
    for ($i = 0; $i < $numeroemails; $i++) {
        echo $faker->email() . "<br/>";
        }
    echo"<h3>Telefonos</h3>";
    for ($i = 0; $i < $numeroTelefonos; $i++) {
        echo $faker->mobileNumber() . "<br/>";
        }
    
    ?>
   
</body>
</html>