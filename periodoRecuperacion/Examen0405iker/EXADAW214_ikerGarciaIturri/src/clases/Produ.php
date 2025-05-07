<?php
namespace App\clases;
use App\interfaces\IntRepoProducto;
class Produ{

   private IntRepoProducto $repositorio;

   function __construct(IntRepoProducto $repositorio){
    $this->repositorio=$repositorio;
   }

   function crearProducto(Producto $producto):bool{
    return $this->repositorio->crear($producto);
   } 

   function listarProductos():array{
    return $this->repositorio->listar();
   }

   function listarProductoId($id):Producto{
    return $this->repositorio->listarPorId($id);
   }

   function borrarProducto($id):bool{
    return $this->repositorio->borrar($id);
   }
}

?>