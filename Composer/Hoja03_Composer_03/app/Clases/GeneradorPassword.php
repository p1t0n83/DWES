<?php
// app/Clases/GeneradorPassword.php

namespace MiAplicacion\Clases;

use MiLibreria\Generator\ComputerPasswordGenerator;

class GeneradorPassword {
    public static function generar(bool $mayusculas, bool $minusculas, bool $numeros, bool $simbolos, int $longitud): string {
        $generator = new ComputerPasswordGenerator();
        $generator->setUppercase($mayusculas);
        $generator->setLowercase($minusculas);
        $generator->setNumbers($numeros);
        $generator->setSymbols($simbolos);
        $generator->setLength($longitud);

        return $generator->generatePassword();
    }
}
