<?php
namespace Ejercicio0405\clases;
use Ejercicio0405\Interfaces\IntRepoProducto;
use Ejercicio0405\clases\Producto;
class Produ
{

    private $intRepoProducto;

    function __construct(IntRepoProducto $repositorio)
    {
        $this->intRepoProducto = $repositorio;
    }


    function crearProducto(Producto $producto, $nombre)
    {
        return $this->intRepoProducto->crear($producto, $nombre);
    }

    function listarProductos()
    {
        return $this->intRepoProducto->listar();
    }

    function listarProductoId($id)
    {
        return $this->intRepoProducto->listarPorId($id);
    }

    function borrarProducto($id)
    {
        return $this->intRepoProducto->borrar($id);
    }
}



?>