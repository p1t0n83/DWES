<?php
namespace App\clases;

class Familia{
    private string $codigo;
    private string $nombre;

    public function __construct(string $codigo,string $nombre){
           $this->nombre=$nombre;
           $this->codigo=$codigo;
    }

    public function __get($campo){
        return $this->$campo;
    }
}
?>