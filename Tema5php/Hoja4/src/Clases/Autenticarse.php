<?php
namespace App\Clases;
use PDOException;
use PDO;
class Autenticarse
{

    static function inicializar()
    {
        iniciar_sesion();
    }

    static function configurar()
    {
        try {
            $conexion = ConexionBD::getConnection();
            $query = 'create table if not exists usuarios(
        id int primary key auto_increment,
        password varchar(1700) not null,
        correo varchar(100) not null,
        UNIQUE(usuario,correo));';
            $conexion->query($query);
            self::crearDatosUsuario();
        } catch (PDOException $e) {
            echo "Error en la creacion de la tabla" . $e->getMessage();
        }
    }

    static private function crearDatosUsuario()
    {
        try {
            $conexion = ConexionBD::getConnection();
            $consulta = $conexion->prepare('insert into usuarios(usuario,password,correo) values(:usuario,:password,:correo)');
            $usuario = "Usuario Prueba";
            $consulta->bindParam(":usuario", $usuario);
            $password = password_hash("1234", PASSWORD_BCRYPT);
            $consulta->bindParam(":pasword", $password);
            $correo = "igarciai02@educantabria.es";
            $consulta->bindParam(":correo", $correo);
            $consulta->execute();
        } catch (PDOException $e) {
            echo "Error en la creacion del usuario" . $e->getMessage();
        }
    }

    static function autenticar()
    {
        if (!esPost()) {
            flash("error", "Metodo HTTP no permitido");
            redireccionar("index.php?accion=paginaLogin");
            return;
        }

        if (estaLogueado()) {
            redireccionar("index.php?accion=paginaConectado");
            return;
        }

        $correo = $_POST['correo'];
        $password = $_POST['password'];
        try {
            $conexion = ConexionBD::getConnection();
            $resultado = $conexion->prepare('select correo,password from usuario where correo=:correo');
            $resultado->bindParam(":correo", $correo);
            $resultado->execute();
            $datos = $resultado->fetch(PDO::FETCH_ASSOC);
            if ($datos) {
                if (password_verify($password, $datos['password'])) {
                    redireccionar("index.php?accion=paginaConectado.");
                } else {
                    redireccionar("index.php?accion=paginaLogin&correo=" . $correo);
                }
            } else {
                redireccionar("index.php?accion=paginaLogin&correo=" . $correo);
            }
        } catch (PDOException $e) {
            flash("credenciales incorrectas", $e->getMessage());
            redireccionar("index.php?accion=paginaLogin&correo=" . $correo);
        }
    }

    static function paginaConectado()
    {
        if (estaLogueado()) {
            redireccionar("index.php?accion=paginaConectado");
        } else {
            flash("No conectado", "No tienes acceso a esta pagina");
            redireccionar("index.php?accion=paginaLogin");
        }
    }

    static function desconectarse(){
        session_destroy();
        redireccionar("index.php?accion=paginaLogin");
    }

    static function paginaLogin(){
        if(estaLogueado()){
            redireccionar("index.php?accion=paginaConectado");
        }else{   
            require 'paginaLogin.php';
            
        }
    }

    static function runAccion($accion){
        switch($accion){
            case "paginaLogin": self::paginaLogin(); break;
            case "autenticar": self::autenticar(); break;
            case "paginaConectado": self::paginaConectado(); break;
            case "desconectarse": self::desconectarse(); break;
            default:redireccionar("index.php?accion=paginaLogin");
        }
    }
}

?>