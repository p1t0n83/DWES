<?php
namespace App\Interfaces;

use App\Clases\Modeloproducto;
interface InterfazProducto
{
    function crear(Modeloproducto $producto): bool;
    function obtenerProductos():array;

    function borrarProducto($nombre):bool;

    function obtenerProducto($nombre):Modeloproducto;
}
?>