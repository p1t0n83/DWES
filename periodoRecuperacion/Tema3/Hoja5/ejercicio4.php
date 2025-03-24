<?php

class Productos{
    protected $codigo;
    protected $precio;
    protected $nombre;

    public function __construct($codigo,$precio,$nombre)
    {
    $this->codigo=$codigo;
    $this->precio=$precio;
    $this->nombre=$nombre;        
    }
}

class Alimentacion extends Productos{
    private $mesCaducidad;
    private $anoCaducidad;
    public function __construct($codigo,$precio,$nombre,$mesCaducidad,$anoCaducidad)
    {
    parent::__construct($codigo,$precio,$nombre);
    $this->mesCaducidad=$mesCaducidad;
    $this->anoCaducidad=$anoCaducidad;        
    }
}

class Electronica extends Productos{
    private $garantia;
    public function __construct($codigo,$precio,$nombre,$garantia)
    {
    parent::__construct($codigo,$precio,$nombre);
    $this->garantia=$garantia;    
    }
}

?>