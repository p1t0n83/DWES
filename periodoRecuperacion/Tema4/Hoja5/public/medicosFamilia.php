<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Todos los medicos de familia</h1>

<a href="index.php">Vuelta al inicio</a>


<?php
require_once "../vendor/autoload.php";

use App\clasesbd\FuncionesBD;
use App\clases\Familia;
try {
    $funcionesBD = new FuncionesBD();
    $medicos = $funcionesBD->getMedicos();
    
    if (!empty($medicos)) {
        echo "<ul>";
        foreach ($medicos as $medico) {
            if($medico instanceof Familia){
            echo "<li>" . $medico . "</li>";
        }
        }
        echo "</ul>";
    } else {
        echo "<p>No hay médicos disponibles.</p>";
    }
} catch (Exception $e) {
    echo "<p>Error al cargar los médicos: " . $e->getMessage() . "</p>";
}
?>
</body>
</html>