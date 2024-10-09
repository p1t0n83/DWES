<?php
class Validacion{
    private string $IBAN;

    public function __construct(string $IBAN){
        $this->IBAN = $IBAN;
    }
        public function longitud(string $IBAN):bool{
          $longitud=strleng($IBAN);
            if($longitud===24){
            return true;
          }else{
            return false;
          }
        }

        public function inicial(string $IBAN){
          if(substr($IBAN,2)==="ES"){
          return true;
          }else{
            return false;
          }
        }
            
    }
?>