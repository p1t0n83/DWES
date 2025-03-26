<?php

namespace MiAplicacion\Clases;

use MiAplicacion\Interfaces\InterfazGeneradorPassword;

require_once '../vendor/autoload.php';
class GeneradorPassword
{

    public function __construct(private readonly InterfazGeneradorPassword $generador) {}

    public function generar(bool $num, bool $mayus, bool $minus, bool $simbols,int $longitud)
    {
        echo "Contraseña Generada <br>";
        echo $this->generador->generar($num, $mayus, $minus, $simbols,$longitud);
    }
}
