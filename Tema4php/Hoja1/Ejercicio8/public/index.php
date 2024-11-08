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
        echo 'Conexión establecida correctamente';
    }
    ?>
    <!--Ejercicio 8-->
    <h1>Ejercicio 8</h1>
    <h1>Traspasos de jugadores</h1>
    <?php
    $equipos = $funciones->getEquipos();
    ?>
    <form method="POST">
        <label for="equipo">Equipo:
            <select id="equipo" name="equipo">
                <?php
                foreach ($equipos as $equipo) {
                    echo '<option>' . $equipo['nombre'] . '</option>';
                }
                echo '<input type="submit" name="enviar" id="enviar"';
                ?>
            </select>
        </label>
    </form>
    <?php
    if (isset($_POST['equipo'])) {
       $equipo=$_POST['equipo'];
    }
    ?>
    <hr>
    <h2>Baja y alta de jugadores:</h2>
    <hr>
    <form method="POST">
        <label for="jugador">Jugadores:
            <select id="jugador" name="jugador">
                <?php
                $jugadores = $funciones->getJugadoresEquipo($equipo);
                foreach ($jugadores as $jugador) {
                    echo '<option>' . $jugador['nombre'] . '</option>';
                }
                ?>
            </select>
        </label>
    </form>
    <form>
        <h3>Datos del nuevo Jugador:</h3>
        <label for="nombreRemplazo">Nombre:<input type="text" name="nombreRemplazo" id="nombreRemplazo"></label>
        <label for="procedenciaRemplazo">Procedencia:<input type="text" name="procedenciaRemplazo" id="procedenciaRemplazo"></label>
        <label for="alturaRemplazo">Altura:<input type="number" id="alturaRemplazo" name="alturaRemplazo"></label>
        <label for="pesoRemplazo">Peso:<input type="number" id="pesoRemplazo" name="pesoRemplazo"></label>
        <label for="posicionRemplazo"><select name="posicionRemplazo" id="posicionRemplazo">
         <option> </option>
        </select></label>
    </form>
</body>

</html>