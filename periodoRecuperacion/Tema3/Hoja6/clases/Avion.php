<?php
  namespace App\Clases;
  use App\Clases\ElementoVolador;

  class Avion extends ElementoVolador{
    private $companiaAerea;
    private $fechaAlta;
    private $altitudMaxima;

    public function __construct($nombre, $numAlas, $numMotores,$companiaAerea,$fechaAlta,$altitudMaxima)
    {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea=$companiaAerea;
        $this->fechaAlta=$fechaAlta;
        $this->altitudMaxima=$altitudMaxima;
    }

    public function volar($altitud){
        if($altitud>0 && $altitud<$this->altitudMaxima){
            if($this->getVelocidad()>=150){
                for($altura=0;$altura<$altitud;$altura+=100){
                    if($altitud-$altura>=100){
                     $this->setAltitud($altura);
                    }else{
                        $this->setAltitud($altitud);
                    }
                }
          }
        }else{
            echo "No se puede poner esa altitud";
        }
    }
 

  function mostrarInformacion(){
    return "Nombre:".$this->nombre.". Numero de alas:".$this->numAlas.". Numeo de motores:".$this->numMotores.". Propietario:".$this->propietario.". Numero de rotores".$this->nRotor."<br>";
} 
}
?>