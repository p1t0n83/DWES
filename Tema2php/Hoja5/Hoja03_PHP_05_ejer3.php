<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    enum turno{
        case MANIANA;
        case TARDE;
    }
    abstract class Medico{
        protected String $nombre;
        protected int $edad;
        protected turno $turno;

        public function __construct(string $nombre, int $edad,turno $turno){
        $this->nombre=$nombre;
        $this->edad =$edad;
        $this->turno=$turno;
        }
    }

    class Familia extends Medico{
        private int $num_pacientes;
        public function __construct(int $num_pacientes,string $nombre, int $edad, turno $turno){
           parent::__construct($nombre,$edad,$turno);
           $this->num_pacientes=$num_pacientes; 
        }
    }

    class Urgencia extends Medico{
        private string $unidad;

        public function __construct(string $unidad,string $nombre, int $edad, turno $turno){
            parent::__construct($nombre,$edad,$turno);
            $this->unidad=$unidad; 
         }
    }


    
    ?>
</body>
</html>