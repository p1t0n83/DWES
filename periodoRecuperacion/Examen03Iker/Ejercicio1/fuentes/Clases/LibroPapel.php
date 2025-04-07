<?php
namespace Ejercicio1\Clases;

class LibroPapel extends Libro{
    private int $numeroPaginas;

    function __construct($titulo,$autor,$numeroPaginas){
           Parent::__construct($titulo,$autor);
           $this->numeroPaginas=$numeroPaginas;
    }
    
    public function getNumeroPaginas(){
        return $this->numeroPaginas;
    }
    function imprime():string{
        return Parent::imprime(). " Numero de paginas: ".$this->numeroPaginas."<br>";
    }
}
?>