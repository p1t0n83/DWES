<?php
namespace MiAplicacion\Interfaces;

interface InterfazGeneradorPassword {
    public function generar(bool $mayusculas, bool $minusculas, bool $numeros, bool $simbolos, int $longitud): string;
}
