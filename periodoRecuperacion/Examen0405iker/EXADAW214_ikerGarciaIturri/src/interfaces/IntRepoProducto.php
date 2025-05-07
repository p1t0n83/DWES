<?php
namespace App\interfaces;
use App\clases\Producto;
interface IntRepoProducto{
    function crear(Producto $producto):bool;

    function listar():array;

    function listarPorId($id):Producto;

    function borrar($id):bool;
}

?>