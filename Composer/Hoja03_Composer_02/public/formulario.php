<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h1>Formulario de Contacto</h1>

    <?php
    // Mostrar mensajes según los parámetros GET
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            echo "<p>Por favor, rellena todos los campos.</p>";
        } elseif ($_GET['error'] == 2) {
            echo "<p>Por favor, introduce un email válido.</p>";
        } elseif ($_GET['error'] == 3) {
            echo "<p>Ha ocurrido un error al enviar el email.</p>";
        }
    }

    if (isset($_GET['success'])) {
        echo "<p>El email se ha enviado correctamente.</p>";
    }
    ?>
   
    <form action="procesa.php" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Correo electrónico:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="asunto">Asunto:</label>
        <input type="text" id="asunto" name="asunto" required>
        <br>
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
