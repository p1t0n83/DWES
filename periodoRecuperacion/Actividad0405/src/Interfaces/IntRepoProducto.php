<?php
namespace Ejercicio0405\Interfaces;

use Ejercicio0405\Clases\Producto;

interface IntRepoProducto
{
    public function crear(Producto $producto): bool;
    public function listar(): array;
    public function listarPorId(int $id): ?Producto;
    public function borrar(int $id): bool;
}