<?php
// formulario.php
$mensaje = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 1:
            $mensaje = 'Por favor, rellena todos los campos.';
            break;
        case 2:
            $mensaje = 'Por favor, introduce un email válido.';
            break;
        case 3:
            $mensaje = 'Ha ocurrido un error al enviar el email.';
            break;
    }
} elseif (isset($_GET['success'])) {
    $mensaje = 'El email se ha enviado correctamente.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h1>Contacto</h1>
    <?php if ($mensaje): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="correo">Correo electrónico:</label>
        <input type="text" name="correo" required><br>
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" required></textarea><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
