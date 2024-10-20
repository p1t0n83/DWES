<?php
namespace App\Clases;
use App\Clases\ElementoVolador;
class Helicoptero extends ElementoVolador
{
    private string $propietario;
    private int $nRotor;

    public function __construct(string $nombre, int $numAlas, int $numMotores, float $altitud, int $velocidad, string $propietario, int $nRotor)
    {
        parent::__construct($nombre, $numAlas, $numMotores, $altitud, $velocidad, );
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;

    }

    public function volar(float $altitudEsperada){
        if ((100 * $this->nRotor)>=$altitudEsperada) {
            while ($this->altitud < $altitudEsperada) {
                $this->altitud += 20;
                if ($this->altitud > $altitudEsperada) {
                    $this->altitud = $altitudEsperada; // Para evitar superar la altitud objetivo
                }
                echo "Altitud actual: " . $this->altitud . " metros<br>";
            }

            echo "Helicoptero ha alcanzado la altitud de " . $this->altitud . " metros.<br>";

        }
    }
    public function volando(): bool
    {
        return $this->altitud > 0 ? true : false;
    }

    public function getRotores()
    {
        return $this->nRotor;
    }
    public function mostrarInformacion()
    {
        echo "Nombre: " . $this->nombre . ".<br/>" .
            " Número de motores: " . $this->numMotores . ".<br/>" .
            "Altitud actual: " . $this->altitud . " metros.<br/>" .
            "Velocidad actual: " . $this->velocidad . ".<br/>" .
            "Propietario: " . $this->propietario . ".<br/>" .
            "Numero de rotores: " . $this->nRotor . ".<br>";
    }

}
?>