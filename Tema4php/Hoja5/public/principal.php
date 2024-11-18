<?php
require '../vendor/autoload.php';
use App\ClasesBD\FuncionBD;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
</head>
<body>
   <?php
   $medicos=FuncionBD::getMedicos();
   foreach($medicos as $medico){
       echo $medico->__toString();
       
   }
   ?>
   <a href="turnos.php">Todos los turnos</a>
   <a href="medicosFamilia.php">Ver medicos de familia</a>
</body>
</html>