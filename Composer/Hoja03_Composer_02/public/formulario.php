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
        switch(intval($_GET['error'])){
        case 1: {
            echo "<p>Por favor, rellena todos los campos.</p>";
        }case 2: {   
            echo "<p>Por favor, introduce un email válido.</p>";
        } case 3: {
            echo "<p>Ha ocurrido un error al enviar el email.</p>";
        }
    }
    }

    if (isset($_GET['success'])) {
        echo "<p>El email se ha enviado correctamente.</p>";
    }
    ?>
   
    <form action="procesa.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" >
        <br>
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje"></textarea>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
