<?php
namespace App\clases;


class Categoria{
    private $id;
    private $nombre;

    function __construct($id,$nombre=''){
        $this->id=$id;
        $this->nombre=$nombre;
    }

    function getNombre(){
        return $this->nombre;
    }
}
?>