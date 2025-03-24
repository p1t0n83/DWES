<?php

class Empleado{
    protected $sueldo;

    function __construct($sueldo){
      $this->sueldo=$sueldo;
    }
    function __get($name){
        return $this->$name;
    }


}

class Encargado extends Empleado{
    
    function __construct($sueldo){
      $this->sueldo=$sueldo*1.15;
    }
    function __get($name){
        return $this->$name;
    }
}

?>