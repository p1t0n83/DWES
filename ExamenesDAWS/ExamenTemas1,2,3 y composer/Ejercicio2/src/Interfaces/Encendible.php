<?php
//creamos el namespace
namespace Ejercicio2\Interfaces;
//creamos la interfaz que utilizaran coche y bombilla
interface Encendible{
    //funciones apagar y encender que no devuelven nada
    public function encender():void;
    public function apagar():void;
}
?>