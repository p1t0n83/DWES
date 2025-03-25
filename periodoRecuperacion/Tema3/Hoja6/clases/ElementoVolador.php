<?php

namespace App\Clases;

use Interfaces\Volador;

abstract class ElementoVolador implements Volador
{
    private $nombre;
    private $numAlas;
    private $numMotores;
    private $altitud;
    private $velocidad;

    public function __construct($nombre, $numAlas, $numMotores)
    {
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0;
        $this->velocidad = 0;
    }


    public function volando()
    {
        if ($this->altitud > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function acelerar($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function setAltitud($altitud){
        $this->altitud=$altitud;
    }

    public function getVelocidad(){
        return $this->velocidad;
    }
    public abstract function volar($altitud);
}
