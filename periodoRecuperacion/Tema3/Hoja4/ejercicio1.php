<?php
       class Circulo{
        private $radio;
        public function __construct($ra){
            $this->radio=$ra;
        }

        public function setRadio($radioNuevo){
                  $this->radio=$radioNuevo;
        }

        public function getRadio(){
            echo "El radio es ".$this->radio. "<br>";
        }

        public function __get($nombre){
            echo "El radio es ".$this->$nombre. "<br>";
        }

        public function __set($nombre,$valor){
            $this->$nombre=$valor;
        }
       }
       
    ?>