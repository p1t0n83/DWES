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

    public function crear(Modeloproducto $product): bool
    {
        return $this->interface->crear($product);
    }
}
