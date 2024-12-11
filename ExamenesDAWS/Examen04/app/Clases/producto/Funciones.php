<?php
namespace App\Clases\producto;
//funciones base de datos
use PDO;
use PDOException;
use App\Interfaces\InterfazObjeto;
use App\Clases\producto\ModeloProducto;
use App\Clases\ConexionBD;
//clase de los metodos conectados a la base de datos
class Funciones implements InterfazObjeto{

     //metodo crear producto
     public  static function crear(ModeloProducto $producto):bool{
       try{
        //la conexion
        $con=ConexionBD::getConnection();
        $con->beginTransaction();
        //insertamos la imagen
        $stmt=$con->prepare('INSERT INTO imagenes(nombre,url) values(:nombre,:url)');
        $stmt->bindParam();
        $stmt->execute();
        //insertamos el producto
        $stmt=$con->prepare('INSERT INTO productos(nombre,precio,descripcion,precio,familia,imagenId) values(:nombre,:precio,:descripcion,:precio,:familia,:imagen) ');
        $stmt->bindParam();
        $stmt->execute();
       
       if($stmt->rowCount()>0){
        $con->commit();
        return true;
       }else{
        $con->rollBack();
        return false;
       }
      
       }catch(PDOException $e){
        throw new PDOException('No se ha podido crear el producto'.$e->getMessage());
        return false;
      }
     }


     //metodo listar productos
     public static  function listar():array{
     try{
       //la conexion
       $con=ConexionBD::getConnection();
       $productos=[];
       $resultado=$con->query('SELECT id,nombre,descripcion,precio,familia,imagenId FROM productos');
       //ahora insertamos el resultado con un fetch de forma que salga en objetos
       while($columna=$resultado->fetch(PDO::FETCH_OBJ)){
        $productos[]=new ModeloProducto($columna->nombre,$columna->descripcion,$columna->precio,$columna->familia,$columna->imagenId,$columna->id);
       }  
        return $productos;
     }catch(PDOException $e){
       throw new PDOException('ha habido un error en la obtencion de los productos'.$e->getMessage());
     }
     }

     //metodo listar por id
     public static function listarPorId($id):ModeloProducto{
           try{
            $con=ConexionBD::getConnection();
            $con->beginTransaction();
            $producto=null;
            //obtenemos el producto por el id
             $stmt=$con->prepare('SELECT id,nombre,descripcion,precio,familia,imagenId FROM productos WHERE id=:id');
             $stmt->bindParam(':id',$id);
             $stmt->execute();
             if($columna=$stmt->fetch(PDO::FETCH_OBJ)){
              $producto=new ModeloProducto($columna->nombre,$columna->descripcion,$columna->precio,$columna->familia,$columna->imagenId,$columna->id);
             }
             return $producto;
           }catch(PDOException $e){
        $con->rollBack();
       throw new PDOException('No se ha podido conseguir el producto'.$e->getMessage());
     }
     }

     //metodo borrar por id
     public static function borrar($id):bool{
     try{
        $con=ConexionBD::getConnection();
        $con->beginTransaction();
        //borrado de la imagen
        //obtenemos la imagen, su id
        $stmt=$con->prepare('SELECT imagenID from productos where id=?');
        $imagenId=$stmt->execute([$id]);
         //borrado del producto
         $stmt=$con->prepare('DELETE FROM productos WHERE id=:id');
         $stmt->bindParam(':id',$id);
         $stmt->execute();
        //borramos la imagen
        $stmt=$con->prepare('DELETE FROM imagenes where id=?');
        $stmt->execute([$imagenId]);
        if($stmt->rowCount()>0){
            $con->commit();
        return true;
    }else{
        $con->rollBack();
        return false;
       }
     }catch(PDOException $e){
        $con->rollBack();
       throw new PDOException('No se ha podido borrar el producto'.$e->getMessage());
     }
     }

     public static function getFamilias():array{
    try{
    //la conexion
     $con=ConexionBD::getConnection();
     $familias=[];
     $resultado=$con->query('SELECT codigo,nombre FROM familias');
     //ahora insertamos el resultado con un fetch de forma que salga en objetos
     while($columna=$resultado->fetch(PDO::FETCH_OBJ)){
     $familias[]=new ModeloFamilia($columna->codigo,$columna->nombre);
 }  
  return $familias;
    }catch(PDOException $e){
     throw new PDOException('No se ha podido conseguir las familias'.$e->getMessage());
   }
  }
}
?>