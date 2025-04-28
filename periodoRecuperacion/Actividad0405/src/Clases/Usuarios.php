<?php
namespace Ejercicio0405\Clases;

class usuarios{
    private $nombre;

    private $password;
    function __construct($nombre,$password){
      $this->nombre=$nombre;
      $this->password=$password;
    }
}
?>