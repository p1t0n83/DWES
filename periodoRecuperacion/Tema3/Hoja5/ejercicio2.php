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

 class CuentaCorriente extends Cuenta{
    private $cuota_mantenimiento;
    public function __construct($numero,$titular,$saldo,$cuota_mantenimiento){
        parent::__construct($numero,$titular,$saldo-$cuota_mantenimiento);
        $this->cuota_mantenimiento=$cuota_mantenimiento;
    }

    public function reintegro($cantidad){
        if($this->saldo>=20){
            $this->saldo-=$cantidad;
        }else{
            echo "No se puede sacar si es menor de 20";
        }
    }

    protected function mostrar(){
        echo "Numero de cuenta: ".$this->numero." Titular: ".$this->titular." Saldo: ".$this->saldo. ". Cuota de mantenimiento: ".$this->cuota_mantenimiento;
  }
 }

 class CuentaAhorro extends Cuenta{
    private $comision_apertura;
    private $intereses;
    public function __construct($numero,$titular,$saldo,$comision_apertura,$intereses){
        parent::__construct($numero,$titular,$saldo-$comision_apertura);
        $this->comision_apertura=$comision_apertura;
        $this->intereses=$intereses;
    }

    public function aplicaInteres(){
        $this->saldo*=$this->intereses;
    }

    protected function mostrar(){
        echo "Numero de cuenta: ".$this->numero." Titular: ".$this->titular." Saldo: ".$this->saldo. ". Comision de apertura: ".$this->comision_apertura.". Intereses".$this->intereses;
  }
 }


?>