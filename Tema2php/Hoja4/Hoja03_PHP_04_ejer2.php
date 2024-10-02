<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Coche{
         private $matricula;
         private $velocidad;

         public function __construct($matricula,$velocidad) {
            $this->matricula=$matricula;
            $this->velocidad=$velocidad;
         }

         public function acelerar($valorVelocidad):void{
            if($valorVelocidad>0 && $this->velocidad+$valorVelocidad<=120){
                $this->velocidad+=$valorVelocidad;
                echo "Se aumento la velocidad<br/>";
            }else{
                echo "No se pudo aumentar<br/>";
            }
         }

         public function desacelerar($valorVelocidad):void{
            if($valorVelocidad<0){
                $valorVelocidad=+$valorVelocidad;
            }
            if($this->velocidad-$valorVelocidad>0){
                $this->velocidad-=$valorVelocidad;
                echo "Se pudo disminuir la velocidad<br/>";
            }else{
                echo "No se pudo disminuir la velocidad<br/>";
            }
         }

         public function mostrar(){
            echo "Matricula del vehiculo: ".$this->matricula.". Velocidad: ".$this->velocidad."<br/>";
         }

    }
    ?>
</body>
</html>