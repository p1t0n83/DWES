
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Pesos</title>
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

    // Obtener equipos
    $equipos = $funciones->getEquipos();
    ?>

    <h1>Actualización de Pesos de Jugadores</h1>

    <!-- Formulario para seleccionar el equipo -->
    <form method="POST">
        <label for="equipo">Seleccionar equipo:</label>
        <select id="equipo" name="equipo">
            <?php
            foreach ($equipos as $equipo) {
                echo '<option>' . $equipo['nombre'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="mostrarJugadores" value="Mostrar Jugadores">
    </form>

    <?php
    // Si se ha seleccionado un equipo, mostrar los jugadores
    if (isset($_POST['equipo'])) {
        $equipo = $_POST['equipo'];
        $jugadores = $funciones->getJugadoresEquipo($equipo);
        
        if (count($jugadores) > 0) {
            // Mostrar la tabla de jugadores con sus pesos
            echo '<form method="POST">';
            echo '<h2>Actualizar Pesos de los Jugadores</h2>';
            echo '<table>';
            echo '<tr><th>Jugador</th><th>Peso</th></tr>';
            
            foreach ($jugadores as $jugador) {
                echo '<tr>';
                echo '<td>' . $jugador['nombre'] . '</td>';
                echo '<td><input type="number" name="peso[' . $jugador['nombre'] . ']" value="' . $jugador['peso'] . '" step="0.01"></td>';
                echo '</tr>';
            }
            
            echo '</table>';
            echo '<br>';
            echo '<input type="submit" name="actualizarPesos" value="Actualizar">';
            echo '</form>';
        } else {
            echo "No hay jugadores en este equipo.";
        }
    }

    // Procesar la actualización de pesos
    if (isset($_POST['actualizarPesos'])) {
        $jugadoresPesos = $_POST['peso'];
        $jugadoresData = [];
        
        // Reorganizar los datos para pasarlos a la función
        foreach ($jugadoresPesos as $nombre => $peso) {
            $jugadoresData[] = [
                'nombre' => $nombre,
                'peso' => $peso
            ];
        }
        
        // Actualizar los pesos de los jugadores
        $funciones->actualizarPesos($jugadoresData);
    }
    ?>
</body>
</html>