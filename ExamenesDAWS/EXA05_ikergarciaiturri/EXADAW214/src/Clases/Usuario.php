<?php
namespace Examen05\Clases;
//metodo para tener la base para los objetos de tipo usuario que creemos
class Usuario{
    private int $id;
    private string $usuario;
    private string $password;

    public function __construct(string $usuario,string $password,int $id=0) {
        $this->id=$id;
        $this->usuario=$usuario;
        $this->password=$password;
    }

    public function getId(){
        return $this->id;
    }
    public function getUsuario(){
        return $this->usuario;
    }

    public function getPassword(){
        return $this->password;
    }
}

?>