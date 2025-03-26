<?php
namespace MiAplicacion\Interfaces;

 interface InterfazGeneradorPassword{
    public function generar(bool $num,bool $mayus,bool $minu,bool $simbols,int $longitud):string;
 }
?>