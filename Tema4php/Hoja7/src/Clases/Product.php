<?php
namespace App\Clases;
use App\Interfaces\InterfazProducto;

class Product
{
    private InterfazProducto $interface;

    public function __construct(InterfazProducto $interface)
    {
        $this->interface = $interface;
    }

    public function crear(Modeloproducto $producto): bool
    {
        return $this->interface->crear($producto);
    }

    public function  obtenerProductos():array{
        return $this->interface->obtenerProductos();
    }

    public function borrarProducto($nombre):bool{
        return $this->interface->borrarProducto($nombre);
    }

    function obtenerProducto($nombre):Modeloproducto{
        return $this->interface->obtenerProducto($nombre);
    }
}
