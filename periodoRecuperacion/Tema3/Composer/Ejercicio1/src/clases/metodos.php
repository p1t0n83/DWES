<?php

namespace App\clases;
use Brick\Math\BigInteger;
class metodos
{
    private $ibanCreado;
    private $ibanPasado;
    private $digitosControl;
    public function __construct($ibanPasado)
    {
        $this->ibanPasado = $ibanPasado;
        $this->ibanCreado = "";
        $this->digitosControl=0;
    }

    function validarLongitudCaracteres()
{
    if (strlen($this->ibanPasado) != 24) {
        echo "El código IBAN no cumple con la longitud";
        return false;
    }

    if (substr($this->ibanPasado, 0, 2) != "ES") {
        echo "Los dos primeros caracteres no son 'ES'";
        return false;
    }

    $todosNumeros = ctype_digit(substr($this->ibanPasado, 2));

    if (!$todosNumeros) {
        echo "Los caracteres siguientes no son números";
        return false;
    }

    return true;
}



    function digitosControl() {
        $nuevoNumero= BigInteger::of(substr($this->ibanPasado,4,24).'142800');
        echo $nuevoNumero.'<br>';
        echo $nuevoNumero%97;
          $R=intval(substr($this->ibanPasado,4,24).'142800')%97;
          $this->digitosControl=98-$R; 
          if(strlen($this->digitosControl)==1){ 
            $digito=$this->digitosControl;
            $this->digitosControl=0+$digito;
          }
          
    }

    function validarCCC(){

    }







    function compararIBAN($creado, $pasado): bool
    {
        if ($creado == $pasado) {
            return true;
        } else {
            return false;
        }
    }
}
