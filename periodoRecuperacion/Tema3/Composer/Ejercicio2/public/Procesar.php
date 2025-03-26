<?php
   require_once "../vendor/autoload.php";
   use App\Clases\ServicioCorreo;
   use App\Clases\ProveedorMailtrap;
   
   if($_SERVER['REQUEST_METHOD']=='GET'){
    $nombre=$_GET['nombre'];
    $correo=$_GET['correo'];
    $mensaje=$_GET['mensaje'];
    if($nombre==null || $correo==null || $mensaje==null){
        header('Location: index.php?error=1');
        exit();
    }

    if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
        header('Location: index.php?error=2');
        exit();
    }

    $servicio=new ServicioCorreo(new ProveedorMailtrap());
    if($servicio->enviarCorreo($correo,$nombre,$mensaje)){
        header('Location: index.php?success=1');
        exit();
    }else{
        header('Location: index.php?error=3');
        exit();
    }
   }

?>