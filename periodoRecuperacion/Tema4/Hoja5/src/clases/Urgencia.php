<?php
namespace App\clases;

class Urgencia extends Medico {
    private $unidad;

    public function __construct($codigo, $nombre, $edad, $turno, $unidad) {
        parent::__construct($codigo, $nombre, $edad, $turno);
        $this->unidad = $unidad;
    }

    // Getter y Setter para unidad
    public function getUnidad() {
        return $this->unidad;
    }

    public function setUnidad($unidad) {
        $this->unidad = $unidad;
    }

    // Sobrescribir el método __toString
    public function __toString() {
        return parent::__toString() . ", Unidad: {$this->unidad}";
    }
}
?>