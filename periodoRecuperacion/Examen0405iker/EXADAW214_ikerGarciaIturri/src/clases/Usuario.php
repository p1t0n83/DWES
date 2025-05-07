<?php
namespace App\clases;

class Usuario{
    private string $usuario;
    private string $password;

    public function __construct(string $usuario,string $password){
       $this->usuario=$usuario;
       $this->password=$password;
    }

    public function __get($campo){
        return $this->$campo;
    }
}

?>