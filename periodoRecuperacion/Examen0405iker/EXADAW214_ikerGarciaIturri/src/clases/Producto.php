<?php
namespace App\clases;

class Producto{
    private int $id;
    private string $nombre;
    private string $descripcion;
    private $precio;
    private string $familia;
    private int $imagenId;

    public function __construct(string $nombre,$precio,string $familia,int $imagenId,string $descripcion="",int $id=0){
      $this->nombre=$nombre;
      $this->precio=$precio;
      $this->familia=$familia;
      $this->imagenId=$imagenId;
      $this->descripcion=$descripcion;
      $this->id=$id;
    }

    public function __get($campo){
       return $this->$campo;
    }
}



?>