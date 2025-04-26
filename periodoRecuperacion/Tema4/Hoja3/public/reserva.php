<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de asiento</title>
</head>

<body>
    <h1>Reserva de asiento</h1>
    <hr>
    <form method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" required><br><br>

        <label for="asiento">Asiento:</label><br>
        <select id="asiento" name="asiento" required>
            <?php
            require_once "../vendor/autoload.php";
            use App\FuncionesBD;
            $funciones = new FuncionesBD();
            $asientos = $funciones->getAsientos();
            foreach ($asientos as $asiento) {
                echo "<option value=" . $asiento->numero . ">" . $asiento->numero . "</option>";
            }
            ?>
        </select><br><br>
        <button type="submit">Reservar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recoger los datos del formulario
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $asiento = $_POST['asiento'];

        // Validar que los campos no estén vacíos
        if (empty($nombre) || empty($dni) || empty($asiento)) {
            echo "Todos los campos son obligatorios.";
            exit;
        }

        // Crear una instancia de FuncionesBD
        $funciones = new FuncionesBD();

        // Llamar al método reserva para guardar los datos
        if ($funciones->reserva($nombre, $dni, $asiento)) {
            echo "Reserva realizada con éxito.";
        }
    }
    ?>
</body>

</html>