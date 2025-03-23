<?php
 
 class Monedero{
    private $dinero;
    public static $numero_monederos= 0;
      
    public function __construct($dinero){
      self::$numero_monederos++;
      $this->dinero=$dinero;
    }
    public function meter($dinero){
             if($dinero>0){
              $this->dinero=$dinero;
             }
             
    }

    public function sacar($dinero){
            if($this->dinero-$dinero>=0){
              $this->dinero-=$dinero;
            }else{
              echo "No tienes suficiente dinero"; 
            }
    }

    public function disponible($dinero){
               echo "dispones de ".$this->dinero." dinero";
    }
 }
?>