<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Circulo
    {
        private float $radio;
        public function __construct(float $valor)
        {
            $this->radio = $valor;
        }
        /*
                public function setRadio(float $nuevoRadio):void{
                    $this->radio=$nuevoRadio;
                }

                public function getRadio():float{
                    return $this->radio;
                }
                    */

        public function __get(float $nombre):mixed{
            return $this->$nombre;
        }

        //este set cambia por ejemplo, si le metemos $radio, nos cambia radio
        public function __set($name, $valor):void{           
                $this->$name = $valor;
            
        }
    }
    ?>
</body>

</html>