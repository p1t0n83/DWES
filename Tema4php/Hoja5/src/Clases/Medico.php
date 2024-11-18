<?php
namespace App\Clases;

abstract class Medico {
    protected int $codigo;
    protected string $nombre;
    protected int $edad;
    protected Turno $turno;

    public function __construct(int $codigo, string $nombre, int $edad, Turno $turno) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }

    

    public function __get($nombre):mixed {
        return $this->$nombre;
    }

    public function setTurno(Turno $turno): void {
        $this->turno = $turno;
    }

    
    public function __toString(): string {
        return "[Código: {$this->codigo}, Nombre: {$this->nombre}, Edad: {$this->edad},  {$this->turno}]";
    }
}

?>