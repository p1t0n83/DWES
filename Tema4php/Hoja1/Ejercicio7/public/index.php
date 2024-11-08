<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    require_once '../vendor/autoload.php';
    use App\Clases\ConexionBD;
    use App\Clases\FuncionBD;
    $connection = ConexionBD::getConnection();
    $funciones = new FuncionBD();
    if ($connection instanceof PDO) {
        echo '';
    }
    ?>
    <!--Ejercicio 7-->
    <h1>Ejercicio 7</h1>
    <?php
    $equipos = $funciones->getEquipos();
    ?>
    <form method="POST">
        <label for="equipo">Equipo:</label>
        <select id="nombre" name="nombre">
            <?php
            foreach ($equipos as $equipo) {
                echo '<option>' . $equipo['nombre'] . '</option>';
            }
            echo '<input type="submit" name="enviar" id="enviar"';
            ?>
        </select>
        </label>
    </form>
    <table>
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['nombre'])) {
            $nombreEquipo = strval($_POST['nombre']);
            $jugadores = $funciones->getJugadoresEquipo($nombreEquipo);
            echo '<th>Nombre</th><th>peso</th>';
            foreach ($jugadores as $jugador) {
                echo '<tr><td>' . $jugador['nombre'] . '</td><td>' . $jugador['peso'] . 'kg</td></tr>';
            }
        }
        ?>
    </table>
</body>
</html>