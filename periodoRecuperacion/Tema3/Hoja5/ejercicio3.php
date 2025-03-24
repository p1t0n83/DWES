<?php
abstract class Medico{
    protected $nombre;
    protected $edad;
    protected $turno;

     function __construct($nombre,$edad,$turno)
     {
        $this->nombre=$nombre;
        $this->edad=$edad;
        $this->turno=$turno;
     }
}

class Familia extends Medico{
    private $num_pacientes;

    function __construct($nombre,$edad,$turno,$num_pacientes)
    {
        parent::__construct($nombre,$edad,$turno);
       $this->num_pacientes=$num_pacientes;
    }
}
?>