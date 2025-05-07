<?php
namespace App\clases;

class Imagen{
    private int $id;
    private string $nombre;
    private string $url;

    public function __construct(string $nombre,string $url,int $id=0){
       $this->nombre=$nombre;
       $this->url=$url;
       $this->id=$id;
    }

    public function __get($campo){
       return $this->$campo;
    }
}

?>