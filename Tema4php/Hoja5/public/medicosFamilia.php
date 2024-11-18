<?php
require '../vendor/autoload.php';
use App\ClasesBD\FuncionBD;

// Variable para almacenar los médicos filtrados
$medicosFamilia = [];

if (isset($_POST['numPacientes']) && is_numeric($_POST['numPacientes'])) {
    $numPacientes = $_POST['numPacientes'];

    // Obtener médicos de familia con el número de pacientes igual o superior al número ingresado
    $medicosFamilia = FuncionBD::getMedicosFamiliaPorNumPacientes($numPacientes);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicos de Familia</title>
</head>

<body>
    <h1>Consultar Médicos de Familia</h1>

    <form method="POST" action="medicosFamilia.php">
        <label for="numPacientes">Número de Pacientes (mínimo):</label>
        <input type="number" name="numPacientes" id="numPacientes" min="0" required>
        <input type="submit" value="Consultar">
    </form>

    <?php if (!empty($medicosFamilia)) {
        echo ' <h2>Médicos de Familia con al menos ' . $numPacientes . ' pacientes:</h2>';
        foreach ($medicosFamilia as $medico) {
            echo $medico->__toString();
        }

    } else {
        echo '<p>No se encontraron médicos de familia con ese número de pacientes o más.</p>';
    } ?>
    <a href="turnos.php">Inicio</a>
    <a href="turnos.php">Ver turnos médicos</a>
</body>

</html>