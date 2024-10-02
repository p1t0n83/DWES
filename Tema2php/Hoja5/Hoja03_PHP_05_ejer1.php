<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Empleado
    {
        protected $nombre;
        protected $sueldo;

        public function __construct($nombre, $sueldo)
        {
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }

        public function getSueldo():String
        {
            return "Sueldo de $this->nombre = ".$this->sueldo."<br/>";
        }
    }

    class Encargado extends Empleado
    {
        // para heredar el constructor del padre usamos parent para referirse al padre.
        //como cuando usamos self para staticos en la misma clase
        public function __construct($nombre, $sueldo)
        {
            parent::__construct($nombre, $sueldo);
        }
        public function getSueldo():String
        {
            return "Sueldo de $this->nombre = ".$this->sueldo*1.15."<br/>";
        }
    }
     $empleado1=new Empleado("Elsa",1000);
     $empleado2=new Encargado("Iker",1000);

     $sueldo1=$empleado1->getSueldo();
     $sueldo2=$empleado2->getSueldo();
    echo $sueldo1;
    echo $sueldo2;
    ?>
</body>

</html>