<?php
namespace App\Clases\producto;

class ModeloFamilia{

    private string $codigo;
    private string $nombre;
   
    public function __construct(string $codigo,string $nombre){
        $this->codigo=$codigo;
        $this->nombre=$nombre;
    }

    public function getCodigo():string{
        return $this->codigo;
    }
    public function getNombre():string{
        return $this->nombre;
      }

}
?>