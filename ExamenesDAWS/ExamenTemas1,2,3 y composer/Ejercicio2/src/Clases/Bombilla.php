<?php
//creamos namespace
namespace Ejercicio2\Clases;
//usa la interfaz
use Ejercicio2\Interfaces\Encendible;
//creamos la bombilla con la interfaz implementada
class Bombilla implements Encendible{
    //instanciamos su unica variable
    private int $horasDeVida;
//constructor que recibe las horas de vida y las inicializa
    public function __construct($horasVida){
       $this->horasDeVida=$horasVida;
    }
//funcion encender mientras haya horas de vida, si tiene 1 sola, se quedara en 0 no en -1
    function encender():void{
      if($this->horasDeVida>0){
        echo"Se ha encendido la bombilla <br>";
        if($this->horasDeVida-2<0){
            $this->horasDeVida=0;
        }else{
           $this->horasDeVida-=2;
        }
      }else{
        echo"No se pudo encender la bombilla <br>";
      }
    }

//funcion de apagar, solo muestra un mensaje
    function apagar():void{
        echo"Se ha apagado la bombilla <br>";
    }
}
?>