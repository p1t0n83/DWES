<?php
// app/Clases/AdaptadorGeneradorPassword.php

namespace MiAplicacion\Clases;

use MiAplicacion\Interfaces\InterfazGeneradorPassword;

class AdaptadorGeneradorPassword implements InterfazGeneradorPassword {
    public function generar(bool $mayusculas, bool $minusculas, bool $numeros, bool $simbolos, int $longitud): string {
        return GeneradorPassword::generar($mayusculas, $minusculas, $numeros, $simbolos, $longitud);
    }
}
