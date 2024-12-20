<?php
require '../vendor/autoload.php';
use App\Clases\FuncionBD;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Gestionar sesiones</h1>
    <?php
    session_start();
    $_SESSION['visitas'][]= date("Y-m-d H:i:s");
    if (
        !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        !FuncionBD::verificarUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])
    ) {
        // Pedir credenciales al usuario
        header('WWW-Authenticate: Basic realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido. Debe proporcionar credenciales válidas.";
        exit; // Detener ejecución si las credenciales son incorrectas
    }
    
    echo "Nombre de usuario:".$_SERVER['PHP_AUTH_USER'];
    echo "<hr>";
    echo "Hash de la contraseña: ".password_hash($_SERVER['PHP_AUTH_PW'],PASSWORD_BCRYPT);
    if(count($_SESSION['visitas'])===0){
        echo "Esta es su primera visita";
    }else{
        for($i=0;$i<count($_SESSION['visitas']);$i++){
            echo $_SESSION['visitas'][$i]."<hr>";
        }
    } 
    echo "<form method='POST'><button type='submit' id='borrar' name='borrar' value'borrar'>Limpiar Registros</button></form>";
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['borrar'])){
           session_destroy();
        }
    }
    ?>
      

</body>

</html>