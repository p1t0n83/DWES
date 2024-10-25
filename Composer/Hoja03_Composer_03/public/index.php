<?php
// public/index.php

require '../vendor/autoload.php'; // Cargar autoload de Composer

use MiAplicacion\Clases\AdaptadorGeneradorPassword;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $useUppercase = isset($_POST['uppercase']);
    $useLowercase = isset($_POST['lowercase']);
    $useNumbers = isset($_POST['numbers']);
    $useSymbols = isset($_POST['symbols']);
    $length = (int)$_POST['length'];

    // Generar la contraseña
    $adaptador = new AdaptadorGeneradorPassword();
    $password = $adaptador->generar($useUppercase, $useLowercase, $useNumbers, $useSymbols, $length);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Contraseñas</title>
</head>
<body>
    <h1>Generador de Contraseñas</h1>
    <form method="post">
        <label>
            <input type="checkbox" name="uppercase"> Mayúsculas
        </label><br>
        <label>
            <input type="checkbox" name="lowercase" checked> Minúsculas
        </label><br>
        <label>
            <input type="checkbox" name="numbers"> Números
        </label><br>
        <label>
            <input type="checkbox" name="symbols"> Símbolos
        </label><br>
        <label>
            Longitud: <input type="number" name="length" value="12" min="1">
        </label><br>
        <input type="submit" value="Generar Contraseña">
    </form>

    <?php if (isset($password)): ?>
        <h2>Contraseña Generada:</h2>
        <p><?php echo htmlspecialchars($password); ?></p>
    <?php endif; ?>
</body>
</html>
