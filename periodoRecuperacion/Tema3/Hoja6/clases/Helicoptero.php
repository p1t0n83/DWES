<?php

use App\Clases\ElementoVolador;

class Helicoptero extends ElementoVolador
{
    private $propietario;
    private $nRotor;

    public function __construct($nombre, $numAlas, $numMotores,$propietario,$nRotor)
    {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->propietario=$propietario;
        $this->nRotor=$nRotor;
    }

    public function volar($altitud){

    }
}
