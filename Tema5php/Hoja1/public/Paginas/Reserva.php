<?php
require '../../vendor/autoload.php';
use App\Clases\FuncionBD;
$dniError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['DNI'];
    if (!validarDNI($dni)) {
        $dniError = "El DNI no es válido. El formato debe ser 12345678A.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Asiento</title>
</head>

<body>
    <form method="POST">
        <h1>Reserva de asiento</h1>
        <hr>

        <label for="nombre">Nombre:<input type="text" id="nombre" name="nombre" required></label>
        <hr>

        <label for="DNI">DNI:<input type="text" id="DNI" name="DNI" required>
            
            <?php
            if ($dniError) {
                echo "<span style='color: red;'>$dniError</span>";
            }
            ?>
            <br>
        </label>
        <hr>

        <label for="sexo">Sexo:
            <select id="sexo" name="sexo">
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
            </select>
        </label>
        <hr>

        <label for="asiento">Asiento:
            <select id="plaza" name="plaza">
                <?php
                $plazas = FuncionBD::plazasLibres();
                foreach ($plazas as $plaza) {
                    echo '<option value="' . $plaza['numero'] . '">' . $plaza['numero'] . ' (' . $plaza['precio'] . '€)</option>';
                }
                ?>
            </select>
        </label>
        <hr>
        <input type="submit" value="Reservar" id="reservar">
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$dniError) {
        $nombre = $_POST['nombre'];
        $sexo = $_POST['sexo'];
        $asiento = $_POST['plaza'];
        FuncionBD::reservarPlaza($nombre, $dni, $sexo, $asiento);
    }
    ?>
    <a href="../index.html">Pagina de inicio</a>
</body>

</html>