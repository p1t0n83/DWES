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
    use Examen05\Clases\Acciones;
    if(!estaLogeado()){
        flash("No tienes acceso a la pagina","No has iniciado sesion");
        reedireccionar("mostrarLogin.php");
    }
    ?>
    <h1>Te has conectado</h1>
    <h2>El id del usuario es<?php echo $_POST['id'] ?></h2>
    <form method="POST" ><button type="submit" id="cerrarSesion" name="cerrarSesion">Cerrar Sesión</button></form>
    <?php
    $contador=0;
     if(!$_COOKIE["visitas"]){
        setcookie("visitas",0,time()+3600);
        echo "Bienvenido.Esta es su primera visita";
        $contador++;
     }else{
        echo "Ultimo acceso:".$_COOKIE["visitas"][$contador];
        $contador++;
     }

    if(esPost()){
        Acciones::cerrarSesion(); 
    }
    ?>
</body>
</html>