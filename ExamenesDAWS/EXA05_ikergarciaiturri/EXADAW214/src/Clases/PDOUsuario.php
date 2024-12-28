<?php
namespace Examen05\Clases;
use Examen05\Interfaces\Contratable;
use Examen05\Clases\ConexionBD;
use Examen05\Clases\Usuario;
use PDO;
use PDOException;

//clase pdo que implementa la interfaz para seguir el patron solid y desarrollar el metodo comprobar usuario
class PDOUsuario implements Contratable{
      
    public function construct(){}
// metodo para comprobar usuario, si sale bien retorna 1, dependiendo del error 0, -1 y 2
    public static function comprobarUsuario(Usuario $usuario):int{
        try{ 
         $conexion=ConexionBD::getConexion();
         $query="SELECT id,usuario,clave from usuarios where usuario=:usuario";
         $stmt=$conexion->prepare($query);
         $usuarioNombre=$usuario->getUsuario();
         $stmt->bindParam(":usuario",$usuarioNombre);
         $stmt->execute();
         if($columna=$stmt->fetch(PDO::FETCH_OBJ)){
          $usuarioBD=new Usuario($columna->usuario,$columna->clave,$columna->id);
          if(password_verify($usuario->getPassword(),$usuarioBD->getPassword())){
           return 1;
          }else{
           return 2;
          }
         }else{
            return 0;
         }
        }catch(PDOException $e){
            echo $e->getMessage();
            return -1;
        }
    }
}

?>