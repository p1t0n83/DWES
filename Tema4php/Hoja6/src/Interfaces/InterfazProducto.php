<?php
namespace App\Inerfaces;

use App\Clases\Producto;
interface Interfazproducto
{
    function crear(Producto $producto): bool;
}
?>