<?php
namespace App\clases;

class Familia extends Medico {
    private $numPacientes;

    public function __construct($codigo, $nombre, $edad, $turno, $numPacientes) {
        parent::__construct($codigo, $nombre, $edad, $turno);
        $this->numPacientes = $numPacientes;
    }

    // Getter y Setter para numPacientes
    public function getNumPacientes() {
        return $this->numPacientes;
    }

    public function setNumPacientes($numPacientes) {
        $this->numPacientes = $numPacientes;
    }

    // Sobrescribir el método __toString
    public function __toString() {
        return parent::__toString() . ", Número de Pacientes: {$this->numPacientes}";
    }
}
?>