<?php
namespace Ejercicio0405\Clases;

class usuarios{
    private $nombre;
    private $email;
    private $password;
    function __construct($nombre,$email,$password){
      $this->nombre=$nombre;
      $this->email=$email;
      $this->password=$password;
    }
}
?>