<?php
namespace App\Clases;
class Producto
{
    protected $codigo;
    protected $precio;
    protected $nombre;
    protected $categoria;


    public function __construct($codigo, $precio, $nombre, Categoria $categoria)
    {
         $this->codigo=$codigo;
         $this->precio=$precio;
         $this->nombre=$nombre;
         $this->categoria=$categoria;
    }

    public function __toString()
    {
        return 'Codigo: ' . $this->codigo . '.\n' .
               'Precio: ' . $this->precio . '.\n' .
               'Nombre: ' . $this->nombre . '\n' .
               'Categoria id: ' . $this->categoria->__get('id') . '\n' .
               'Nombre de la categoria: ' . $this->categoria->__get('nombre');
    }
}
?>