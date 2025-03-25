<?php
namespace App\Clases;
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
            if($altitud<=100*$this->nRotor){
                for($altura=0;$altura<$altitud;$altura+=20){
                    if($altitud-$altura>=20){
                     $this->setAltitud($altura);
                    }else{
                        $this->setAltitud($altitud);
                    }
                }
          }

            }
   

     function mostrarInformacion(){
       return "Nombre:".$this->nombre.". Numero de alas:".$this->numAlas.". Numeo de motores:".$this->numMotores.". Propietario:".$this->propietario.". Numero de rotores".$this->nRotor."<br>";
    }
 }
