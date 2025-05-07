<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 require_once "../vendor/autoload.php";
    
   
    use App\clases\Funciones;
    use App\clases\Usuario;
    $funciones=new Funciones();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nombre=$_POST['usuario'];
        $password=$_POST['contrasena'];
        $usuario=new Usuario($nombre,$password);
        $result=$funciones->comprobarUsuario($usuario);
        switch($result){
            case -1:{
                echo "Hay un problema en la base de datos";
                break;
            }
            case 0:{
                echo "El usuario no existe";
                break;
            }
            case 1:{
                redireccionar("index.php?usuario=".$nombre);
                break;
            }
            case 2:{
                echo "El usuario existe, pero la clave es incorrecta";
                break;
            }
        }
            
    }

    ?>  
    <form method="POST">
    <h1>Inicio Sesión</h1>
    <label for="usuario"><input type="text" placeholder="Usuario" name="usuario"></label><br>
    <label for="contrasena"><input type="password" placeholder="Contraseña" name="contrasena"></label><br>
    <button>Login</button>
    </form>

   

</body>
</html>