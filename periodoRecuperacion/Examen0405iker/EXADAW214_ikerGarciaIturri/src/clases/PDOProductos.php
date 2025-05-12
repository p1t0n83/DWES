<?php
namespace App\clases;
use PDO;
use PDOException;
use App\clases\ConexionBD;
use App\clases\Producto;
use App\interfaces\IntRepoProducto;

class PDOProductos implements IntRepoProducto{

    function crear(Producto $producto):bool{
        try{
         $conexion=ConexionBD::getConnection();
         $consulta=$conexion->prepare("INSERT INTO productos(nombre,descripcion,precio,familia,imagenId) values (:nombre,:descripcion,:precio,:familia,:imagenId)");

         $nombre=$producto->__get("nombre");
         $descripcion=$producto->__get("descripcion");
         $precio=$producto->__get("precio");
         $familia=$producto->__get("familia");
         $imagenId=$producto->__get("imagenId");
         

         $consulta->bindParam(":nombre",$nombre);
         $consulta->bindParam(":descripcion",$descripcion);
         $consulta->bindParam(":precio",$precio);
         $consulta->bindParam(":familia",$familia);
         $consulta->bindParam(":imagenId",$imagenId);
         return $consulta->execute();
        }catch(PDOException $error){
            echo ("Error al crear el producto". $error->getMessage());
            return false;
        }
    }

    function listar():array{
        try{
            $conexion=ConexionBD::getConnection();
            $consulta=$conexion->query("SELECT id,nombre,descripcion,precio,familia,imagenId FROM productos");
            $resultado=$consulta->fetchAll(PDO::FETCH_OBJ);
            $productos=[];
            foreach($resultado as $result){
                $producto=new Producto($result->nombre,$result->precio,$result->familia,$result->imagenId,$result->descripcion,$result->id);
                $productos[]=$producto;
            } 
            return $productos;
        }catch(PDOException $error){
            echo ("Error al listar los productos". $error->getMessage());
            return [];
        }
    }

    function listarPorId($id):Producto{
        try{
            $conexion=ConexionBD::getConnection();
            $consulta=$conexion->prepare("SELECTid,nombre,descripcion,precio,familia,imagenId FROM productos WHERE id=:id");
            $consulta->bindParam(":id",$id);
            $consulta->execute();
            $result=$consulta->fetch(PDO::FETCH_OBJ);
            $producto=new Producto($result->nombre,$result->precio,$result->familia,$result->imagenId,$result->descripcion,$result->id);
            return $producto;
         }catch(PDOException $error){
             echo ("Error al sacar el producto". $error->getMessage());
             return new Producto(null,null,null,null);
         }
    }

    function borrar($id):bool{
        try{
            $conexion=ConexionBD::getConnection();
            $consulta=$conexion->prepare("DELETE FROM productos WHERE id=:id");
            $consulta->bindParam(":id",$id);
            if($consulta->execute()){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $error){
            echo ("Error al borrar el producto". $error->getMessage());
            return false;
        }
    }

}


?>