<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <form method="POST">
        <h1>Datos de Registro</h1>
        <label for="usuario">Usuario<input type="text" id="usuario" name="usuario" required></label>
        <br><label for="contrasena">Contraseña<input type="password" id="contrasena" name="contrasena" required></label>
        <br><label for="contrasena2">Repite contraseña<input type="password" id="contrasena2" name="contrasena2"
                required>
        </label>
        <br><input type="submit" value="Enviar">
    </form>
    <?php
    require '../vendor/autoload.php';
    use App\Clases\FuncionBD;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['contrasena'] === $_POST['contrasena2']) {
            $usuario = $_POST['usuario'];
            $contraseña = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
            FuncionBD::insertarUsuario($usuario, $contraseña);
            echo "Se inserto con exito";
        } else {
            echo "las contraseñas no coinciden";
        }
    } else {
        echo "el metodo no es post";
    }

    ?>
</body>

</html>