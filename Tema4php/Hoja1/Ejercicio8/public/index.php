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
                ?>
            </select>
        </label>
        <input type="submit" name="enviar" id="enviar" value="Mostrar">
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
                $jugador=$_POST['jugador'];
                echo(var_dump($jugador));
                ?>
            </select>
        </label>
        <h3>Datos del nuevo Jugador:</h3>
        <label for="nombreRemplazo">Nombre:<input type="text" name="nombreRemplazo" id="nombreRemplazo"></label><br>
        <label for="procedenciaRemplazo">Procedencia:<input type="text" name="procedenciaRemplazo" id="procedenciaRemplazo"></label><br>
        <label for="alturaRemplazo">Altura:<input type="number" id="alturaRemplazo" name="alturaRemplazo" step="0.01"></label><br>
        <label for="pesoRemplazo">Peso:<input type="number" id="pesoRemplazo" name="pesoRemplazo" step="0.01"></label><br>
        <label for="posicionRemplazo">Posicion:<select name="posicionRemplazo" id="posicionRemplazo">
         <option value="f-c">F-C</option>
         <option value="g-f">G-F</option>
         <option value="c">C</option>
         <option value="f">F</option>
         <option value="g">G</option>
        </select></label>
        <br>
        <input type="submit" name="traspaso" id="traspaso" value="Realizar traspaso">
    </form>
    <?php
    if (isset($_POST['traspaso'])) {
        // Capturamos los datos del formulario
        $nombre = $_POST['nombreRemplazo'];
        $procedencia = $_POST['procedenciaRemplazo'];
        $altura = $_POST['alturaRemplazo'];
        $peso = $_POST['pesoRemplazo'];
        $posicion = $_POST['posicionRemplazo'];
        // Llamamos a la función para modificar el jugador
        $funciones->crearJugador(nombre: $nombre, procedencia: $procedencia, altura: $altura, peso: $peso, posicion: $posicion,nombre_equipo: $equipo,nombreBorrar: $jugador);     
    }
    ?>
</body>

</html>