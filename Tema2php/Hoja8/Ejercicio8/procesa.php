<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogiendo los números del formulario
    $primero = isset($_POST['primero']) ? intval($_POST['primero']) : null;
    $segundo = isset($_POST['segundo']) ? intval($_POST['segundo']) : null;
    $operacion = isset($_POST['operacion']) ? intval($_POST['operacion']) : null;
    echo '<h1> resultado</h1>';
    switch ($operacion) {
        case 1:
            echo 'El resultado de realizar la suma de ' . $primero . ' y ' . $segundo . ' es ' . ($primero + $segundo);
            break;
        case 2:
            echo 'El resultado de realizar la resta de ' . $primero . ' y ' . $segundo . ' es ' . ($primero - $segundo);
            break;
        case 3:
            echo 'El resultado de realizar la multiplicación de ' . $primero . ' y ' . $segundo . ' es ' . ($primero * $segundo);
            break;
        case 4:
            echo 'El resultado de realizar la división de ' . $primero . ' y ' . $segundo . ' es ' . ($primero / $segundo);
            break;
        default:
            echo 'Operación no válida.';
            break;
    }
}

?>
<br>
<a href="index.html">Volver</a>