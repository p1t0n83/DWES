<?php
namespace Ejercicio1\Clases;

class LibroElectronico extends Libro{
    private float $tamanoMB;

    function __construct($titulo,$autor,$tamanoMB){
         Parent::__construct($titulo,$autor);
         $this->tamanoMB=$tamanoMB;
    }

    public function getTamanoMB(){
        return $this->tamanoMB;
    }
    function imprime():string{
       return  Parent::imprime(). " Tamaño en MB: ".$this->tamanoMB."<br>";
    }
}
?>