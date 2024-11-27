<?php
require '../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <h1>Registro de usuario</h1>
        <hr>
        <label for="nombre"><input type="text" id="nombre" name="nombre" placeholder="Su nombre"></label>
        <hr>
        <label for="password"><input type="text" id="password" name="password" placeholder="Su clave"></label>
        <hr>
        <label for="passwordre"><input type="text" id="passwordre" name="passwordre" placeholder="Su clave"></label>
        <hr>
        <input type="submit" value="Enviar">
    </form>
    <?php
    use App\Clases\FuncionBD;
      if($_SERVER['REQUEST_METHOD']==='POST'){
        $nombre=$_POST['nombre'];
        $password=$_POST['password'];
        $passwordre=$_POST['passwordre'];
        if($password!=$passwordre){
            echo 'Claves incorrectas';
        }else{
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            FuncionBD::crearUsuario($nombre,$hashedPassword);
        }
      }
    ?>
       <a href="../index.html">Pagina de inicio</a>
</body>

</html>