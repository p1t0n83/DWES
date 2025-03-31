<?php
namespace MiProyecto\Clases;
use MiProyecto\Traits\traits;
class Empleado{

    use traits;
    private $nombre;
    private $edad;
    private $direccion;

    public function __construct($nombre,$edad,$direccion){
        $this->nombre=$nombre;
        $this->edad=$edad;
        $this->direccion=$direccion;
    }

    public function __set($campo,$valor){
        $this->cambiar($campo,$valor);
    }

    public function __get($campo){
        return  $this->obtener($campo);
    }
}



?>