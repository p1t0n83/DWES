<?php

namespace MiProyecto\Clases;
use MiProyecto\Traits\Mensaje;
class Aeropuerto
{
     //meto dentro un use Mensaje;
     use Mensaje;
    private $elementosVolador = array();
    public function __construct()
    {
    }

    public function insertar(ElementoVolador $elementoVolador): void
    {
        array_push($this->elementosVolador, $elementoVolador);
    }

    public function buscar($nombre): void
    {
        $cont = 0;
        foreach ($this->elementosVolador as $elemento) {
            if ($elemento->__get('nombre') === $nombre) {
                echo $elemento->mostrarInformacion();
                $cont++;
            }
        }
        if ($cont === 0) {
            echo "No se encontro el vehiculo";
        }
    }

    public function listarCompania($nombre): void
    {
        $cont = 0;
        foreach ($this->elementosVolador as $elemento) {
            if ($elemento instanceof Avion) {
                if ($elemento->getCompania() === $nombre) {
                    echo $elemento->mostrarInformacion();
                    $cont++;
                }
            }
        }
        if ($cont === 0) {
            echo "No se encontraron vehiculos de la compañia";
        }
    }

    public function rotores($numeroRotores): void
    {
        $cont = 0;
        foreach ($this->elementosVolador as $elemento) {
            if ($elemento instanceof Helicoptero) {
                if ($elemento->getRotores() === $numeroRotores) {
                    echo $elemento->mostrarInformacion();
                    $cont++;
                }
            }
            if ($cont === 0) {
                echo "No se encontraron helicopteros";
            }
        }
    }
    // con el ? decimos que puede ser elemento volador o no lo que nos retornara
    public function despegar($nombre, $altitudEsperada, $velocidad): ?ElementoVolador
    {
        foreach ($this->elementosVolador as $elemento) {
            if ($elemento->__get('nombre') === $nombre) {
                // Acelerar a la velocidad indicada
                $elemento->acelerar($velocidad);
                echo "Acelerando " . $elemento->__get('nombre') . " a " . $velocidad . " km/h.<br>";
                // Hacer que el objeto vuele a la altitud deseada
                $elemento->volar($altitudEsperada);

                // Devolver el objeto después de haber despegado
                return $elemento;
            }
        }

        // Si no se encontró el elemento, se devuelve null
        echo "No se encontró el vehículo con nombre: " . $nombre . ".<br>";
        return null;
    }
}
?>