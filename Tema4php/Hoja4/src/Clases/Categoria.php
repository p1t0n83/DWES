<?php
namespace App\Clases;
class Categoria
{
   private $id;
   private $nombre;


    public function __construct($id,$nombre)
    {
         $this->id=$id;
         $this->nombre=$nombre;
    }

    public function __get($nombre){
   return $this->nombre;
    }
}
?>