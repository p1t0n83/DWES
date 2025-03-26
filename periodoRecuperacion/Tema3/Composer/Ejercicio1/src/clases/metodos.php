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
        $this->digitosControl = 0;
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

   function digitosControl()
    {
        $R = BigInteger::of(substr($this->ibanPasado, 4, 24) . '142800')->remainder(97);
        $Digitos = BigInteger::of(98)->minus($R);
        
        $this->digitosControl = $Digitos;
        $digitosStr = $this->digitosControl->toBase(10);
        if (strlen($digitosStr) == 1) {
            $digitosStr = '0' . $digitosStr;
        }
        $this->digitosControl = $digitosStr;
    }

   function validarCCC()
    {
        $CCC = substr($this->ibanPasado, 4, 24);

        $numerosPrimerDigito = '00'.substr($CCC, 0, 8) ;
        $primerDigito=$this->calcularDigitoCCC( $numerosPrimerDigito);

        $numerosSegundoDigito=substr($CCC,10,10);
        $segundoDigito=$this->calcularDigitoCCC($numerosSegundoDigito);
          
        return substr($CCC, 0, 8).$primerDigito.$segundoDigito.$numerosSegundoDigito;
    }

    private function calcularDigitoCCC($numerosDigito){
        $pesos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];
        $Suma=0;
        for ($i = 0; $i < strlen($numerosDigito); $i++) {
            $Suma += intval($numerosDigito[$i]) * $pesos[$i];
        }
        $Digito =BigInteger::of(11)->minus(BigInteger::of($Suma)->mod(11));
        if ($Digito->isEqualTo(11)) {
            $Digito = 0;
        } else if ($Digito->isEqualTo(10)) {
            $Digito = 1;
        }
       
        return $Digito;
    }

    public function compararIBAN(): bool
    {
        $this->digitosControl();
        $this->ibanCreado="ES".$this->digitosControl.$this->validarCCC();
        echo $this->ibanCreado."<br>";
        echo $this->ibanPasado."<br>";
        
        if ($this->ibanCreado == $this->ibanPasado) {
            return true;
        } else {
            return false;
        }
    }
}
