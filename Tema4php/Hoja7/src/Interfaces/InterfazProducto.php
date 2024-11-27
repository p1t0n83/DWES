<?php
namespace App\Interfaces;

use App\Clases\Modeloproducto;
interface InterfazProducto
{
    function crear(Modeloproducto $producto): bool;
}
?>