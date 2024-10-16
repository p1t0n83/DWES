<?php
$equipos = [
    "Real Madrid" => [
        "Entrenador" => "zidane.png",
        "Jugadores" => [
            "Courtois" => "courtois.png",
            "Ramos" => "ramos.png",
            "Hazard" => "hazard.png"
        ],
    ],
    "Barcelona" => [
        "Entrenador" => "koeman.png",
        "Jugadores" => [
            "Ter Stegen" => "ter.png",
            "Piqué" => "pique.png",
            "Griezmann" => "griezman.png"
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de Fútbol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        img {
            width: 100px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .equipo {
            width: 45%;
        }
    </style>
</head>
<body>
    <h1>Elige un equipo</h1>
    <hr>
    <form method="POST">
        <label for="equipo">Equipo:</label>
        <select name="equipo" id="equipo">
            <option value="">--Seleccione un equipo--</option>
            <option value="todos">Todos los equipos</option>
            <?php
            foreach ($equipos as $equipo => $valores) {
                $selected = (isset($_POST['equipo']) && $_POST['equipo'] == $equipo) ? 'selected' : '';
                echo "<option value='$equipo' $selected>$equipo</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="radio" name="opcion" value="entrenador" id="entrenador" required>
        <label for="entrenador">Entrenador</label>
        <input type="radio" name="opcion" value="jugadores" id="jugadores">
        <label for="jugadores">Jugadores</label>
        <br><br>
        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['equipo']) && isset($_POST['opcion'])) {
        $equipoSeleccionado = $_POST['equipo'];
        $opcionSeleccionada = $_POST['opcion'];

        if ($equipoSeleccionado == "todos") {
            if ($opcionSeleccionada == "entrenador") {
                echo "<h2>Entrenadores de todos los equipos</h2>";
                echo "<table>";
                echo "<tr><th>Equipo</th><th>Entrenador</th></tr>";
                foreach ($equipos as $nombreEquipo => $valores) {
                    $imagen = $valores['Entrenador'];
                    echo "<tr><td>$nombreEquipo</td><td><img src='imagenes/$imagen' alt='Entrenador de $nombreEquipo' width='100'></td></tr>";
                }
                echo "</table>";
            } elseif ($opcionSeleccionada == "jugadores") {
                echo "<h2>Jugadores de todos los equipos</h2>";
                echo "<div class='container'>";

                // Jugadores del Real Madrid
                echo "<div class='equipo'>";
                echo "<h3>Real Madrid</h3>";
                echo "<table>";
                foreach ($equipos["Real Madrid"]["Jugadores"] as $jugador => $imagen) {
                    echo "<tr><td><img src='imagenes/$imagen' alt='Jugador de Real Madrid'> <br>$jugador</td></tr>";
                }
                echo "</table>";
                echo "</div>";

                // Jugadores del Barcelona
                echo "<div class='equipo'>";
                echo "<h3>Barcelona</h3>";
                echo "<table>";
                foreach ($equipos["Barcelona"]["Jugadores"] as $jugador => $imagen) {
                    echo "<tr><td><img src='imagenes/$imagen' alt='Jugador de Barcelona'> <br>$jugador</td></tr>";
                }
                echo "</table>";
                echo "</div>";

                echo "</div>";
            }
        } else {
            if ($opcionSeleccionada == "entrenador") {
                echo "<h2>Entrenador de $equipoSeleccionado</h2>";
                echo "<table><tr><th>Entrenador</th></tr>";
                echo "<tr><td><img src='imagenes/{$equipos[$equipoSeleccionado]['Entrenador']}' alt='Entrenador de $equipoSeleccionado'></td></tr>";
                echo "</table>";
            } elseif ($opcionSeleccionada == "jugadores") {
                echo "<h2>Jugadores de $equipoSeleccionado</h2>";
                echo "<table>";
                foreach ($equipos[$equipoSeleccionado]['Jugadores'] as $jugador => $imagen) {
                    echo "<tr><td><img src='imagenes/$imagen' alt='Jugador de $equipoSeleccionado'> <br>$jugador</td></tr>";
                }
                echo "</table>";
            }
        }
    }
    ?>
</body>
</html>
