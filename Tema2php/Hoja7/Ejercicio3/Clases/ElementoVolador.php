<?php

namespace MiProyecto\Clases;

use MiProyecto\Interfaces\Volador;
 abstract class ElementoVolador implements Volador
 {
    
     protected string $nombre;
     protected int $numAlas;
     protected int $numMotores;
     protected float $altitud;

     protected int $velocidad;

     public function __construct(string $nombre, int $numAlas, int $numMotores, float $altitud, int $velocidad)
     {
         $this->nombre = $nombre;
         $this->numAlas = $numAlas;
         $this->numMotores = $numMotores;
         $this->altitud = $altitud;
         $this->velocidad = $velocidad;
     }

     public function __get($name):mixed{
       return $this->$name;
     }
     public function volando(): bool
     {
         return $this->altitud > 0 ? true : false;
     }

     public function acelerar(int $velocidad): void
     {
         $this->velocidad += $velocidad;
     }
     public abstract function volar(float $altitud);
     public abstract function mostrarInformacion();

     
 }
?>