<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get" action="Procesar.php">
        <h1>Prueba de envio de correo a traves de MailTrap</h1>
        <label for="nombre">Nombre:<br>
            <input type="text" name="nombre" id="nombre">
        </label><br>
        <label for="correo">Correo:<br>
            <input type="text" name="correo" id="correo">
        </label><br>
        <label for="mensaje">Mensaje:<br>
            <textarea name="mensaje" id="mensaje"></textarea>
        </label><br>
        <button type="submit">Enviar</button>
</body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
     if(isset($_GET['error'])){
    $error = $_GET['error'];
    if ($error != null) {
        switch ($error) {
            case "1":
                echo "Por favor, rellena todos los campos";
                break;
            case "2":
                echo "Por favor, introduce un email valido";
                break;
            case "3":
                echo "Ha ocurrido un error al enviar el email";
                break;
            case "success":
                echo "El email se ha enviado correctamente";
                break;
        }
    }
}
    if (isset($_GET['success'])) {
        $success = $_GET['success'];
        if ($success) {
            echo "El email se ha enviado con exito";
        }
    }
}
?>

</html>