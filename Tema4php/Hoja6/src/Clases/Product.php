<?php

namespace App\Classes;

use App\Interfaces\InterfazProducto;
use App\Clases\Modeloproducto;

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
