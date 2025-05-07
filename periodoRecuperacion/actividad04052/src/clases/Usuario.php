<?php
namespace Ejercicio0405\Clases;

class Usuario{
    private $nombre;

    private $password;
    function __construct($nombre,$password){
      $this->nombre=$nombre;
      $this->password=$password;
    }
}
?>