<?php

namespace Ejercicio0405\Clases;
use Ejercicio0405\Interfaces\Metodos;
class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $familia;
    private $descripcion;
    

    function __construct($nombre,$precio,$familia,$descripcion,$id=0) {
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->familia=$familia;
        $this->descripcion=$descripcion;
        $this->id=$id;
    }

    function __get($tipo){
          return $this->$tipo;
    }

    
}
