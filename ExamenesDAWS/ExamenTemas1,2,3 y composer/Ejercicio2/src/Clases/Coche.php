<?php
//creamos el namespace
namespace Ejercicio2\Clases;
//usa la interfaz
use Ejercicio2\Interfaces\Encendible;
//creamos clase coche que implementa la interfaz
class Coche implements Encendible{
    //creamos sus 3 variables
    private int $gasolina;
    private int $bateria;
    private bool $estado;
//instanciamos las variables en el constructor
    public function __construct(){
     $this->gasolina=0;
     $this->bateria=10;
     $this->estado=false;
    }
//encendemos el coche si esta apagado y sus variables son mayor que 0
    public function encender():void{
       if($this->estado===false && $this->bateria>0 && $this->gasolina>0){
        //ponemos a true el estado y restamos uno tanto a la bateria como a la gasolina
        $this->estado=true;
        $this->bateria--;
        $this->gasolina--;
        echo "Se ha arrancado el coche <br>";
       }else{
        echo"No se pudo encender el coche <br>";
       }
    }

//apaga el coche si esta encendido
    public function apagar():void{
        if($this->estado===true){
            $this->estado=false;
            echo"Se ha parado el coche <br>";
        }else{
            echo"No se pudo apagar el coche <br>";
        }
    }
//aumenta la gasolina con la cantidad pasada por parametros si es mayor que 0
    public function repostar($litros):void{
      if($litros>0){
        $this->gasolina+=$litros;
        echo "Se aumentaron los litros de gasolina <br>";
      }else{
        echo "No se pudieron aumentar los litros <br>";
      }
    }
}
?>