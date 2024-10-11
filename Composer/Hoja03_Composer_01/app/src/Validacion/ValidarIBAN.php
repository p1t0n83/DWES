<?php

namespace App\Validacion;

use Brick\Math\BigInteger;

class ValidarIBAN
{
    public function validarIBAN(string $iban): bool
    {
        // Elimina espacios y convierte a mayúsculas
        $iban = strtoupper(str_replace(' ', '', $iban));

        // Verifica longitud correcta para España (24 caracteres)
        if (strlen($iban) !== 24 || substr($iban, 0, 2) !== 'ES') {
            return false;
        }

        // Mueve los primeros 4 caracteres al final del IBAN
        $ibanReordenado = substr($iban, 4) . substr($iban, 0, 4);

        // Reemplaza las letras por números (E = 14, S = 28)
        $ibanNumerico = str_replace(['E', 'S'], ['14', '28'], $ibanReordenado);

        // Calcula el módulo 97 usando BigInteger para números grandes
        $numero = BigInteger::of($ibanNumerico);
        return $numero->mod(97)->isEqualTo(1);
    }
}
