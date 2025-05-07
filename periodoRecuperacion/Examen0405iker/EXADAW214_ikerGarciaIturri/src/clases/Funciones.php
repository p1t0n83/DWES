<?php
namespace App\clases;
use PDO;
use PDOException;
use App\clases\ConexionBD;
use App\clases\Familia;
use App\clases\Usuario;
use App\clases\Imagen;
class Funciones{

    function getFamilias():array{
        try{
           $conexion=ConexionBD::getConnection();
           $consulta=$conexion->query("SELECT codigo,nombre FROM familias");
           $resultados=$consulta->fetchAll(PDO::FETCH_OBJ);
           
           $familias=[];
           foreach($resultados as $resultado){
           $familia=new Familia($resultado->codigo,$resultado->nombre);
           $familias[]=$familia;
           }
           return $familias;
        }catch(PDOException $error){
            echo ("Error al sacar todas las familias". $error->getMessage());
            return [];
        }
    }


    function getFamilia($codigo):Familia |null{
        try{
           $conexion=ConexionBD::getConnection();
           $consulta=$conexion->prepare("SELECT codigo,nombre FROM familias WHERE codigo=:codigo");
           $consulta->bindParam(":codigo",$codigo);
           $consulta->execute();
           $resultado=$consulta->fetch(PDO::FETCH_OBJ);
           $familia=new Familia($resultado->codigo,$resultado->nombre);
           return $familia;
        }catch(PDOException $error){
            echo ("Error al sacar la familia". $error->getMessage());
            return null;
        }
    }

    function comprobarUsuario(Usuario $usuario):int{
           try{
            $conexion=ConexionBD::getConnection();
            $consulta=$conexion->prepare("SELECT usuario,password FROM usuarios WHERE usuario=:usuario");

           
            $nombre=$usuario->__get("usuario");
            $consulta->bindParam(":usuario",$nombre);
            $consulta->execute();

            //si no existe el usuario
            if(empty($consulta)){
              return 0;
            }
            
            $resultado=$consulta->fetch(PDO::FETCH_OBJ);
            $usuarioBase=new Usuario($resultado->usuario,$resultado->password);
            if(!password_verify($usuario->__get("password"),$usuarioBase->__get("password"))){
              return 2;
            }else{
                return 1;
            } 
           }catch(PDOException $error){
            return -1;
        }
    }
    

    function crearImagen(Imagen $imagen):int{
       try{
        $conexion=ConexionBD::getConnection();
        $consulta=$conexion->prepare("INSERT INTO imagenes(nombre,url) VALUES (:nombre,:url)");
        $nombre=$imagen->__get("nombre");
        $url=$imagen->__get("url");
        $consulta->bindParam(":nombre",$nombre); 
        $consulta->bindParam(":url",$url);
        $consulta->execute();
        return $conexion->lastInsertId();
    }catch(PDOException $error){
        echo ("Error al crear la imagen". $error->getMessage());
        return 0;
    }
}

function getImagen($id):Imagen |null{
    try{
       $conexion=ConexionBD::getConnection();
       $consulta=$conexion->prepare("SELECT id,nombre,url FROM imagenes WHERE id=:id");
       $consulta->bindParam(":id",$id);
       $consulta->execute();
       $resultado=$consulta->fetch(PDO::FETCH_OBJ);
       $imagen=new Imagen($resultado->nombre,$resultado->url,$resultado->id);
       return $imagen;
    }catch(PDOException $error){
        echo ("Error al sacar la imagen". $error->getMessage());
        return null;
    }
}
}

?>