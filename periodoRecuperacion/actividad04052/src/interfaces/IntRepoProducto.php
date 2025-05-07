<?php
namespace Ejercicio0405\Interfaces;
use Ejercicio0405\Clases\Producto;
interface IntRepoProducto{
    function crear(Producto $producto,string $nombre):bool;

    function listar():array;

    function listarPorId($id):Producto;

    function borrar($id):bool;
}


?>