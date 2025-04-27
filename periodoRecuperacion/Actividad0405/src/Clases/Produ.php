<?php
namespace Ejercicio0405\Clases;

use Ejercicio0405\Interfaces\IntRepoProducto;

class Produ
{
    private $repositorio;

    public function __construct(IntRepoProducto $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function crearProducto(Producto $producto): bool
    {
        return $this->repositorio->crear($producto);
    }

    public function listarProductos(): array
    {
        return $this->repositorio->listar();
    }

    public function obtenerProductoPorId(int $id): ?Producto
    {
        return $this->repositorio->listarPorId($id);
    }

    public function borrarProducto(int $id): bool
    {
        return $this->repositorio->borrar($id);
    }
}