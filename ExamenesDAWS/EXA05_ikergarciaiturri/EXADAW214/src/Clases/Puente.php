<?php
namespace Examen05\Clases;
use Examen05\Interfaces\Contratable;
//clase puente para el patron solid entre la interfaz contratable y PDOUsuario
class Puente{
  // variable de la interfaz
    private Contratable $contratable;

    public function __construct(Contratable $contratable){
        $this->contratable=$contratable;
    }
    //metodo comprobar usuario
    public function comprobarUsuario(Usuario $usuario):int{
         return $this->contratable->comprobarUsuario($usuario);
    }
}
?>