<?php
namespace App\Clases;
class Turno {
    private int $id;
    private string $descripcion;

    public function __construct(int $id, string $descripcion) {
        $this->id = $id;
        $this->descripcion = $descripcion;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function __toString(): string {
        return $this->descripcion;
    }
}


?>