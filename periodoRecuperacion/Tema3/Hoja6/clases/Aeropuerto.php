<?php
     namespace App\Clases;
      use App\Clases\ElementoVolador;
      use App\Clases\Avion;
class Aeropuerto{
    private $elementosVoladores;

    public function __construct(){
        $this->elementosVoladores=[];
    }

    public function insertar(ElementoVolador $elementoVolador) {
        // Añadir el nuevo elemento al final del array
        $this->elementosVoladores[] = $elementoVolador;
    }

    public function buscar($nombre){
        $volador=null;  
        foreach($this->elementosVoladores as $elemento){
            if($elemento->nombre==$nombre){
                $volador=$elemento;
                break; 
            }  
            return $volador;
          }  
    }

    public function listarCompania($compania){
        $aviones=[];
        foreach($this->elementosVoladores as $elemento){
            if($elemento instanceof Avion){
               if($elemento->companiaAerea==$compania){
            $aviones[]=$elemento->mostrarInformacion();
            }
        }
    }   
    return $aviones;
}


public function rotores($rotores){
    $helicopteros=[];
    foreach($this->elementosVoladores as $elemento){
        if($elemento instanceof Avion){
           if($elemento->nRotor==$rotores){
        $helicopteros[]=$elemento->mostrarInformacion();
        }
    }
}   return $helicopteros;
}

    public function despegar($nombre,$altitud,$velocidad){
        foreach($this->elementosVoladores as $elemento){
            if($elemento->nombre==$nombre){
                $elemento->acelerar($velocidad);
                $elemento->volar($altitud);
                $elemento->volando();
                break;
            }
    }
}
}
?>