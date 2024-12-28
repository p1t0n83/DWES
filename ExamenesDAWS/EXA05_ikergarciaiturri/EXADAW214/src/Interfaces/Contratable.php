<?php
namespace Examen05\Interfaces;
//interfaz para el patron SOLID con un solo metodo
use Examen05\Clases\Usuario;
interface Contratable{
    //metodo para comprobar usuarios que se crear en PDOUsuario
     public static function comprobarUsuario(Usuario $usuario):int;
}
?>