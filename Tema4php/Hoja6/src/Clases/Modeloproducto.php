<?php
namespace App\Clases;

class Modeloproducto{
   private string $nombre;
    private string $descripcion;
    private float $precio;
    private string $imagen;

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }
}