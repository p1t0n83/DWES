<?php
namespace Ejercicio0405\Clases;

class Imagen{
      private $nombre;
      private $id;
      private $producto;

    function __construct($nombre,$id=0,$producto=0){
          $this->nombre=$nombre;
          $this->id=$id;
          $this->producto=$producto;
    }
    function __get($tipo){
        return $this->$tipo;
  }
  
}
?>