<?php

class Cuenta{
    protected $numero;
    protected $titular;
    protected $saldo;

    public function __construct($numero,$titular,$saldo){
           $this->numero=$numero;
           $this->titular=$titular;
           $this->saldo=$saldo;
    }

    protected function ingreso($cantidad){
        $this->saldo+=$cantidad;
    } 

    protected function reintegro($cantidad){
        if($this->saldo=$cantidad>=0){
           $this->saldo-=$cantidad;
        }else{
            echo "no se puede sacar lo que no hay";
        }
    }

    protected function esPreferencia($cantidad){
        if($this->saldo>$cantidad){
            return true;
        }else{
        return false;
    }
    }

    protected function mostrar(){
          echo "Numero de cuenta: ".$this->numero." Titular: ".$this->titular." Saldo: ".$this->saldo;
    }
}

?>