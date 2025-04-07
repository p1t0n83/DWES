<?php
namespace Ejercicio1\Clases;
use Ejercicio1\Interfaces\Identificable;
use DateTime;

class Prestamo implements Identificable{
    private Libro $libro;
    private Usuario $usuario;
    private DateTime $fechaPrestamo;
    private ?DateTime $fechaDevolucion;

    function __construct($libro,$usuario,$fechaPrestamo){
           $this->libro=$libro;
           $this->usuario=$usuario;
           $this->fechaPrestamo=$fechaPrestamo;
           $this->fechaDevolucion=null;
    }
 
    public function getLibro(){
        return $this->libro;
    }

    public function getUsuario(){
        return $this->usuario;
    }
    public function getFechaDevolucion(){
        return $this->fechaDevolucion;
   }
    public function setFechaDevolucion($fechaDevolucion){
         $this->fechaDevolucion=$fechaDevolucion;
    }

    function imprime():string{
        return $texto= ' Libro: '.$this->libro->imprime(). ' Usuario'.$this->usuario->imprime()." Fecha de prestamo: ".$this->fechaPrestamo->format('Y-m-d'). " Fecha de devolucion: ".($this->fechaDevolucion === null ? "No devuelto" : $this->fechaDevolucion->format('Y-m-d'));;
    }
}