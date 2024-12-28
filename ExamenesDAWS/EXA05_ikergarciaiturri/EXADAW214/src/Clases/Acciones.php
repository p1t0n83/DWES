<?php
namespace Examen05\Clases;

class Acciones{
//clase con las acciones a realizar en las paginas de index, mostrarConectado y mostrarLogin
    static function inicializar(){
        iniciarSesion();
    }

    //si no hay ninguna sesion activa, nos manda a la pagina login para iniciar sesion
    static function paginaLogin(){
        if(!isset($_SESSION['usuario'])){
          reedireccionar("Fuentes/mostrarLogin.php");
        }
    }
    //mira a ver si hay sesiones activas para mandarnos a la pagina de conectado o a la de login
    static function paginaConectado(){
        if(isset($_SESSION['usuario'])){
            reedireccionar("Fuentes/mostrarConectado.php");
        }else{
            reedireccionar("Fuentes/mostrarLogin.php");
        }
    }

    // cerrar sesion, tambien borra la cookie creada
    static function cerrarSesion(){
        session_destroy();
        setcookie("visitas",time()-3600);
        redireccionar("Fuentes/mostrarLogin.php");
    }

    
     //metodo que utiliza la pagina index.php para saber a donde tiene que redirijir a partir de un action que se le pasa por url
    static function runAction(){
        if(isset($_GET['action'])){
        $accion=$_GET['action'];
        switch($accion){
          case 'paginaLogin': self::paginaLogin();
          case 'mostrarConectado': self::paginaConectado();
          case 'cerrarSesion': self::cerrarSesion();
          default: self::paginaLogin();
        }
        
        }else{
            self::paginaLogin();
        }
    }
}

?>