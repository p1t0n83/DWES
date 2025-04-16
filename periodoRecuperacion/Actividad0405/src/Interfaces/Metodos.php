<?php
namespace Ejercicio0405\Interfaces;

use Ejercicio0405\Clases\Producto;
interface Metodos{
    function crear(Producto $producto):bool;

    function listar():array;

    function listarPorId($id):bool;

    function borrar($id):bool;
}

?>