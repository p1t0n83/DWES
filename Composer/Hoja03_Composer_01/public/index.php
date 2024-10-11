<?php
require_once '../vendor/autoload.php';

use App\Validacion\ValidarIBAN;

var_dump(class_exists('App\Validacion\ValidarIBAN')); // Comprobar si la clase se carga

$validacion = new ValidarIBAN();
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iban = $_POST['iban'];
    $resultado = $validacion->validarIBAN($iban) ? 'IBAN válido' : 'IBAN no válido';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar IBAN</title>
</head>
<body>
    <h1>Validar Código IBAN</h1>
    <form method="POST">
        <label for="iban">Introduce el IBAN:</label>
        <input type="text" name="iban" id="iban" required>
        <button type="submit">Validar</button>
    </form>

    <?php if ($resultado !== null): ?>
        <p><?= htmlspecialchars($resultado) ?></p>
    <?php endif; ?>
</body>
</html>
