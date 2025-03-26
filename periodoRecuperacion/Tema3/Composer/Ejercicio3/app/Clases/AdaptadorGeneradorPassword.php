<?php

namespace MiAplicacion\Clases;


use MiAplicacion\Interfaces\InterfazGeneradorPassword;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class AdaptadorGeneradorPassword implements InterfazGeneradorPassword
{

    private ComputerPasswordGenerator $generator;

    public function __construct()
    {
        $this->generator = new ComputerPasswordGenerator();
    }
    public function generar(bool $num, bool $mayus, bool $minus, bool $simbols,int $longitud): string
    {
        $this->generator
            ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, $mayus)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, $minus)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, $num)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, $simbols)
            ->setLength($longitud);
        return $this->generator->generatePassword();
    }
}
