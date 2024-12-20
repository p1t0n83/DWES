<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="index.php?accion=autenticar">
        <label for="correo">Correo Electronico: <br><input type="mail" id="correo" name="correo" required></label><br>
        <label for="password">Contraseña: <br><input type="password" id="password" name="password" required></label><br>
        <button type="submit">Iniciar Sesion</button>
    </form>
    <?php
      require_once "../vendor/autoload.php";
      use App\Clases\Autenticarse;
      if(esPost()){
      iniciar_sesion();
      Autenticarse::paginaConectado();
      if (isset($_SESSION['No conectado']) && is_array($_SESSION['No conectado'])) {
        $error = $_SESSION['No conectado'];
        if (isset($error['mensaje'])) {
            echo $error['mensaje'];
        }
    }
}
    ?>
</body>
</html>