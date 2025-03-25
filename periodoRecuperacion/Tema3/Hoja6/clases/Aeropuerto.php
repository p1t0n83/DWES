<?php

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

    public function listarCompania(){
        
    }
    
}
 

?>