<?php
namespace Ejercicio1\Clases;
use Ejercicio1\Interfaces\Identificable;

class Usuario implements Identificable{
    private string $nombre;
    private string $apellidos;
    private string $dni;

    function __construct($nombre,$apellidos,$dni){
         $this->nombre=$nombre;
         $this->apellidos=$apellidos;
         $this->dni=$dni;
    }
 

    public function getDni(){
        return $this->dni;
    }
    function imprime():string{
        return "Nombre del usuario: ".$this->nombre." ".$this->apellidos." DNI: ".$this->dni. "<br>";
    }

}

?>