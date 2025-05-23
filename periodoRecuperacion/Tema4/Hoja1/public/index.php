<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Equipos y Jugadores</title>
</head>

<body>
    <h1>Equipos</h1>
    <hr>
    <form method="post">
        <label for="equipo">Selecciona un equipo:<br>
        <select name="equipo">
            <?php
            require_once '../vendor/autoload.php';

            use App\Clases\FuncionesBD;

            $conexion = new FuncionesBD();
            $equipos = $conexion->getEquipos();
            foreach ($equipos as $equipo) {
                echo '<option value="' . $equipo->nombre . '">' . $equipo->nombre . '</option>';
            }
            ?>
        </select></label><br><br>
        <button>Enviar</button>
    </form>
    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['equipo'])) {
        $equipo = $_POST['equipo'];
        $conexion = new FuncionesBD();
        $jugadores = $conexion->getJugadores($equipo);
         
        // Mostrar los jugadores en una tabla
        echo '<h2>Jugadores del equipo: ' . $equipo . '</h2>';
        echo '<form method="post">';
        echo '<table border="1" cellpadding="5" cellspacing="0">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nombre</th>';
        echo '<th>Peso</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($jugadores as $jugador) {
            echo '<tr>';
            echo '<td>' . $jugador->nombre . '</td>';
            echo '<td><input type="number" step="0.01" name="pesos[' . $jugador->codigo . ']" value="' . $jugador->peso . '"></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '<input type="hidden" name="equipo" value="' . $equipo . '">';
        echo '<button> actualizar</button>';
        echo '</form>';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pesos'])) {
        $conexion->actualizarPesos($_POST['pesos'], $_POST['equipo']);
    }
    ?>
    <hr>

    <h1>Traspaso de jugadores</h1>
    <hr>
    <form method="post">
        <label for="equipo2">Selecciona un equipo para el traspaso:<br>
        <select name="equipo2">
            <?php
            $equipos = $conexion->getEquipos();
            foreach ($equipos as $equipo) {
                echo '<option value="' . $equipo->nombre . '">' . $equipo->nombre . '</option>';
            }
            ?>
        </select></label><br><br>
        <button>Enviar</button>
    </form>
    <hr>
    <form method="post">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['equipo2'])) {
            echo '<h1>Baja y Alta de jugadores:</h1><hr>';
            echo '<label for="baja">Selecciona un jugador para dar de baja:<br>';
            echo '<select name="baja">';
            $jugadores = $conexion->getJugadores($_POST['equipo2']);
            foreach ($jugadores as $jugador) {
                echo '<option value="' . $jugador->codigo . '">' . $jugador->nombre . '</option>';
            }
            echo '</select></label><br><br>';
        ?>

        <h2>Datos del nuevo jugador:</h2>
        <label for="nombre">Nombre:<br>
            <input type="text" name="nombre" required><br><br>
        </label>
        <label for="procedencia">Procedencia:<br>
            <input type="text" name="procedencia"><br><br>
        </label>
        <label for="altura">Altura:<br>
            <input type="number" step="0.01" name="altura"><br><br>
        </label>
        <label for="peso">Peso:<br>
            <input type="number" step="0.01" name="peso"><br><br>
        </label>
        <label for="posicion">Posición:<br>
        <select name="posicion">
            <?php
            $posiciones = $conexion->getPosiciones();
            foreach ($posiciones as $posicion) {
                echo '<option value="' . $posicion['posicion'] . '">' . $posicion['posicion'] . '</option>';
            }
            ?>
        </select></label>
        <hr>
        <button>Realizar traspaso</button>
    </form>
    <?php }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['baja'])) {
        $id = $_POST['baja']; 
        $nombre = $_POST['nombre']; 
        $procedencia = $_POST['procedencia']; 
        $altura = $_POST['altura'];
        $peso = $_POST['peso']; 
        $posicion = $_POST['posicion']; 
         $conexion->traspaso($id,$nombre,$procedencia,$peso,$altura,$posicion);
    }?>
</body>

</html>