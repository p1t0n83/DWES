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
        $digitosControlCCC = BigInteger::of($CCC, );
       
  

        $pesos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

        $primerDigito=$this->calcularPrimerDigitoCCC($CCC,$pesos);


        $segundoDigito=$this->calcularSegundoDigitoCCC($CCC,$pesos);
          
        return $primerDigito.$segundoDigito;
    }

     private function calcularPrimerDigitoCCC($CCC,$pesos){

        $numerosPrimerDigito = substr($CCC, 0, 8) . '00';
        
        $primeraSuma = 0;
        for ($i = 0; $i < strlen($numerosPrimerDigito); $i++) {
            $primeraSuma += intval($numerosPrimerDigito[$i]) * $pesos[$i];
        }
        $primerDigito =BigInteger::of(11)->minus(BigInteger::of($primeraSuma)->mod(11));
        if ($primerDigito->isEqualTo(11)) {
            $primerDigito = 0;
        } else if ($primerDigito->isEqualTo(10)) {
            $primerDigito = 1;
        }
      
        return substr($CCC, 0, 8).$primerDigito;
    }

    private function calcularSegundoDigitoCCC($CCC,$pesos){

        $numerosSegundoDigito=substr($CCC,10,10);
       
        $segundaSuma=0;
        for ($i = 0; $i < strlen($numerosSegundoDigito); $i++) {
            $segundaSuma += intval($numerosSegundoDigito[$i]) * $pesos[$i];
        }
        $segundoDigito =BigInteger::of(11)->minus(BigInteger::of($segundaSuma)->mod(11));
        if ($segundoDigito->isEqualTo(11)) {
            $segundoDigito = 0;
        } else if ($segundoDigito->isEqualTo(10)) {
            $segundoDigito = 1;
        }
       
        return $segundoDigito.$numerosSegundoDigito;
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
