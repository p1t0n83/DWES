<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogiendo los datos con $_POST
    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : 'No especificado';
    $modulos = isset($_POST['modulos']) ? $_POST['modulos'] : [];

    echo "<h2>Datos recibidos por POST:</h2>";
    echo "Nombre del alumno: " . $nombre . "<br>";

    if (!empty($modulos)) {
        echo "Módulos que cursa:<br>";
        foreach ($modulos as $modulo) {
            echo htmlspecialchars($modulo) . "<br>";
        }
    } else {
        echo "No ha seleccionado ningún módulo.<br>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Recogiendo los datos con $_GET (por si se envían a través de GET)
    $nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : 'No especificado';
    $modulos = isset($_GET['modulos']) ? $_GET['modulos'] : [];

    echo "<h2>Datos recibidos por GET:</h2>";
    echo "Nombre del alumno: " . $nombre . "<br>";

    if (!empty($modulos)) {
        echo "Módulos que cursa:<br>";
        foreach ($modulos as $modulo) {
            echo htmlspecialchars($modulo) . "<br>";
        }
    } else {
        echo "No ha seleccionado ningún módulo.<br>";
    }
}
?>
