<?php
namespace Ejercicio0405\Clases;

class CestaCompra{
    private $cesta;

    function __construct(){
          $this->cesta=[];
    }

    function nuevoArticulo($id){

    }

    function getProductos(){
        return $this->cesta;
    }

    function getCoste(){
        return 0;
    }
    function estaVacia(){
        return false;
    }
}
?>