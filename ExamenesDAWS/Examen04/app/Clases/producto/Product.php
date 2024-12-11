<?php
namespace App\Clases\producto;
//use para poder crear interfaces
use App\Interfaces\InterfazObjeto;
//y objetos
use App\Clases\producto\ModeloProducto;
//clase puente entre Funciones y InterfazObjeto ya que utilizamos el principio SOLID
  class Product{
    //para que haga de puente necesitamos que tenga un objeto de la interfaz que tiene los metodos
    private InterfazObjeto $interfaz;

    public function __construct(InterfazObjeto $interfaz){
        $this->interfaz=$interfaz;
    }

    //ahora los metodos
    //crear
    public function crear(ModeloProducto $producto):bool{
       return $this->interfaz->crear($producto);
    }

    //listar
    public function listar():array{
       return $this->interfaz->listar();
    }

    //listar por id
    public function listarPorId($id):ModeloProducto{
        return $this->interfaz->listarPorId($id);
    }

    //borrar
    public function borrar($id):bool{
        return $this->interfaz->borrar($id);
    }

    //getFamilia
    public function getFamilias():array{
      return $this->interfaz->getFamilias();
    }
  }
?>