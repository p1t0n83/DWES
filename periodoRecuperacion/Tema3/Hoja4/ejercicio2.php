<?php

class Coche{
    private $matricula;
    private $velocidad;

    public function __construct($matricula,$velocidad){
       $this->matricula=$matricula;
       $this->velocidad=$velocidad;
    }

    public function acelerar($velocidad){
        if($this->velocidad+$velocidad<=120){
            $this->velocidad+=$velocidad;
        }else{
            echo "no se puede acelerar mas <br>";
        }
    }

    public function frena($velocidad){
        if($this->velocidad-$velocidad>=0){
            $this->velocidad-=$velocidad;
        }else{
            echo " no se puede frenar mas de 0 <br>";
        }
    }

    public function toString(){
        echo "Velocidad:".$this->velocidad.". Matricula:".$this->matricula."<br>"; 
    }
}
?>