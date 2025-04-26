<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form method="GET" action="">
        <label for="turno">Introduce el turno:</label>
        <input type="text" id="turno" name="turno" placeholder="Ejemplo: Mañana">
        <button type="submit">Buscar</button>
    </form>

    <h1>Todos los medicos de turno</h1>

    <a href="turnos.php">Turnos</a>
    <a href="medicosFamilia.php">Familia</a>

    <?php
    require_once "../vendor/autoload.php";
    use App\clasesbd\FuncionesBD;

    if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['turno'])){
    $turno = $_GET['turno'];
    try {
        $funcionesBD = new FuncionesBD();
        $medicos = $funcionesBD->getMedicos();

        if (!empty($medicos)) {
            echo "<ul>";
            foreach ($medicos as $medico) {
                if ($medico->getTurno() == $turno) {
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
}
    ?>
</body>

</html>