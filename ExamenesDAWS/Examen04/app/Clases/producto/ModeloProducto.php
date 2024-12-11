<?php
namespace App\Clases\producto;
//clase que es el modelo de productos
  
  class ModeloProducto{
     //sus variables segun la base de datos
     private int $id;

     private string $nombre;

     private string $descripcion;

     private float $precio;

     private string $familia;

     private int $imagenId;



     public function __construct(string $nombre,string $descripcion,float $precio,string $familia,int $imagenId,int $id=0){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->precio=$precio;
        $this->familia=$familia;
        $this->imagenId=$imagenId;
     }

      public function getId():int{
        return $this->id;
      }

      public function getNombre():string{
        return $this->nombre;
      }

      public function getDescripcion():string{
        return $this->descripcion;
      }

      public function getPrecio():float{
        return $this->precio;
      }

      public function getFamilia():string{
        return $this->familia;
      }

      public function getImagenId():int{
       return $this->imagenId;
      }

  }
?>