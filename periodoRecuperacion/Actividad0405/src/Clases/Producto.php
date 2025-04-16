<?php

namespace Ejercicio0405\Clases;
use Ejercicio0405\Interfaces\Metodos;
class Producto implements Metodos
{
    private $id;
    private $titulo;
    private $precio;
    private $familia;
    private $descripcion;
    private $imagenId;

    function __construct($titulo,$precio,$familia,$descripcion,$imagenId,$id=0) {
        $this->titulo=$titulo;
        $this->precio=$precio;
        $this->familia=$familia;
        $this->descripcion=$descripcion;
        $this->imagenId=$imagenId;
        $this->id=$id;
    }

    function __get($tipo){
          return $this->$tipo;
    }

    function crear(Producto $producto):bool{
        return false;
    }

    function listar():array{
        return [];
    }

    function listarPorId($id):bool{
        return false;
    }

    function borrar($id):bool{
        return false;
    }
}
