<?php
//fichero con todas las funciones estaticas
// funcion flash para almacenar errores durante un tiempo entre paginas
 function flash(string $clave,string $mensaje=null):null|string{
   if($mensaje!==null){
    $_SESSION['flash'][$clave]=$mensaje;
    return $mensaje;
   }

   if(isset($_SESSION['flash'][$clave])){
   $mensajeGuardado=$_SESSION['flash'][$clave];
   unset($_SESSION['flash'][$clave]);
   return $mensajeGuardado;
   }
   return null;
 }
//metodo para iniciar sesion si no se ha hecho ya
 function iniciarSesion():void{
    if(session_status()===PHP_SESSION_NONE){
     session_start();
    }
 }
//metodo para seber si se ha iniciado sesion
 function estaLogeado():bool{
    return isset($_SESSION['usuario']);
 }
 //metodo para reedirecionar a la url que le pases por parametro
 function reedireccionar($url):void{
     header("Location: {$url}");
 }
 //metodo para saber si un formulario utiliza metodo post
 function esPost():bool{
    return $_SERVER['REQUEST_METHOD']=='POST';
 }

?>