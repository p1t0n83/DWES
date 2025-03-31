<?php
namespace Clases;
use Clases\ElementoVolador;
use Clases\Avion;
use Traits\Mensaje;
class Aeropuerto
{
    use Mensaje;
    private $elementosVoladores;

    public function __construct()
    {
        $this->elementosVoladores = [];
    }

    public function insertar(ElementoVolador $elementoVolador)
    {
        // Añadir el nuevo elemento al final del array
        $this->elementosVoladores[] = $elementoVolador;
    }

    public function buscar($nombre)
    {
        $volador = null;
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento->getNombre() == $nombre) {
                $volador = $elemento;
                $info=$volador->mostrarInformacion();
                $this->mostrarMensaje($info);
                break;
            }
        }
        if ($volador === null) {
            $this->mostrarMensaje("No encontrado");
        }
    }

    public function listarCompania($compania)
    {
        $aviones = [];
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento instanceof Avion) {
                if ($elemento->getCompaniaAerea() == $compania) {
                    $aviones[] = $elemento->mostrarInformacion();
                }
            }
        }
        return $aviones;
    }


    public function rotores($rotores)
    {
        $helicopteros = [];
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento instanceof Helicoptero) {
                if ($elemento->getNRotor() == $rotores) {
                    $helicopteros[] = $elemento->mostrarInformacion();
                }
            }
        }
        return $helicopteros;
    }

    public function despegar($nombre, $altitud, $velocidad)
    {
        foreach ($this->elementosVoladores as $elemento) {
            if ($elemento->getNombre() == $nombre) {
                $elemento->acelerar($velocidad);
                $elemento->volar($altitud);
                $elemento->volando();
                break;
            }
        }
    }
}
?>