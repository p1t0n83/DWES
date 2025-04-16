<?php
namespace Ejercicio0405\Clases;

class Imagen{
      private $nombre;
      private $id;

    function __construct($nombre,$id){
          $this->nombre=$nombre;
          $this->id=$id;
    }
    function __get($tipo){
        return $this->$tipo;
  }
}
?>