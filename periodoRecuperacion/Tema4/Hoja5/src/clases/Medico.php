<?php
namespace App\clases;
use App\clases\Turno;
class Medico {
    protected $codigo;
    protected $nombre;
    protected $edad;
    protected Turno $turno; // Objeto de la clase Turno

    function __construct($codigo, $nombre, $edad, $turno) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }

    // Getters
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getTurno() {
        return $this->turno;
    }

    // Setters
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setTurno($turno) {
        $this->turno = $turno;
    }

    // Método __toString
    public function __toString() {
        return "Código: {$this->codigo}, Nombre: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno->getNombre()}";
    }
}
?>