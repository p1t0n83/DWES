<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Circulo{
        private $radio;
        public function __construct($valor){
            $this->radio=$valor;
        }
/*
        public function setRadio($nuevoRadio):void{
            $this->radio=$nuevoRadio;
        }

        public function getRadio():int{
            return $this->radio;
        }
            */
        
        public function __get($name){    
            //pongo un if para saber si es un radio lo que le entra  
            if($name==='radio'){     
            return $this->radio;}
        }
        
        public function __set($atributo,$valor){
            //pongo un if para saber si es un radio lo que le entra  
            if($atributo==='radio'){
            $this->radio=$valor;}
        }
    }
    ?>
</body>
</html>