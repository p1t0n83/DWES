<?php
namespace App\Clases\producto;

class producto{
   public function __construct(int $id,string $nombre,float $precio,string $descripcion,string $imagen) {
    $this->id=$id;
    $this->nombre=$nombre;
    $this->precio=$precio;
    $this->descripcion=$descripcion;
    $this->imagen=$imagen;
   } 
}

?>