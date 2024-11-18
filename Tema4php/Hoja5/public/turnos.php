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
    <form method="POST">
        <h1>Turnos</h1>
        <select id="respuesta" name="respuesta">
            <option value="Mañana">Mañana</option>
            <option value="Tarde">Tarde</option>
            <option value="24 horas">24 Horas</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>
    <hr>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $respuesta=$_POST['respuesta'];
        $medicos = FuncionBD::getMedicosPorTurno($respuesta);
        foreach ($medicos as $medico) {
            echo $medico->__toString();
        }
    }
    ?>
    <a href="principal.php">Inicio</a>
</body>

</html>