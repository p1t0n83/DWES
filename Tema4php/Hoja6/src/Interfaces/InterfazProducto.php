<?php
namespace Interfaces\Interfazproducto;
use App\Clases\Producto;
interface InterfazProducto
{
    function crear(Producto $producto): bool;
}
?>