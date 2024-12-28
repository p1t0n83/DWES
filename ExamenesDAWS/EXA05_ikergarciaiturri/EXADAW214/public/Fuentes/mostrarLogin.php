<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once '../../vendor/autoload.php';
    require_once '../../src/Ficheros/funciones.php';
    use Examen05\Clases\Puente;
    use Examen05\Clases\Usuario;  
    use Examen05\Clases\PDOUsuario;
    //clase mostrarLogin para los logeos y los intentos de inicio de sesion,es la pagina a la que se nos manda si no hemos iniciado sesion
    //if para mandarnos a la pagina conectado si ya estamos logeados
    if(estaLogeado()){
        reedireccionar("mostrarConectado.php");
    }  
    //formulario para iniciar sesion, que pide usuario y contraseña
    ?>
    <form method="post">
    <h1>Inicio de Sesion</h1>
    <label for="usuario">Usuario:<br><input type="text" id="usuario" name="usuario"></label><br>
    <label for="password">Contraseña:<br><input type="password" id="password" name="password"></label><br>
    <input type="submit" value="iniciarSesion" id="iniciarSesion" name="iniciarSesion">
    </form>

<?php
//si el metodo es post guarda los datos del formulario y mira mediante el paatron SOLID si el usuario se encuentra en la base de datos
if(esPost()){
    $usuario=$_POST['usuario'];
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
$usuario=new Usuario($usuario,$password);
$puente=new Puente(new PDOUsuario());
$comprobacion=$puente->comprobarUsuario($usuario);
//este switch controla los diferentes casos que se pueden dar
switch($comprobacion){
    case -1:  flash("error","Hay un problema en la base de datos");break;
    case 0:  flash("error","no existe ese usuario");break;
    case 1: reedireccionar("../index.php?action=mostrarConectado");break;
    case 2: flash("error","El usuario existe, pero la clave no corresponde a la introducida");break;
    default: flash("error", "No sabemos que ha pasado");break;
}
if (isset($_SESSION['flash']['error'])) {
    echo '<div class="error-message">' . $_SESSION['flash']['error'] . '</div>';
    unset($_SESSION['flash']['error']); // Limpiar el mensaje después de mostrarlo
}
}else{
    echo "El method no es post";
}
?>
</body>
</html>