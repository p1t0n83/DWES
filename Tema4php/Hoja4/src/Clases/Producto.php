<?php
namespace App\Clases;
class Producto
{
    protected int $codigo;
    protected float $precio;
    protected string $nombre;
    protected Categoria $categoria;


    public function __construct($codigo, $precio, $nombre, Categoria $categoria)
    {
         $this->codigo=$codigo;
         $this->precio=$precio;
         $this->nombre=$nombre;
         $this->categoria=$categoria;
    }

    public function toString()
    {
        return 'Codigo: ' . $this->codigo . '.<br>' .
               'Precio: ' . $this->precio . '.<br>' .
               'Nombre: ' . $this->nombre . '<br>' .
               'Categoria id: ' . $this->categoria->__get('id') . '<br>' .
               'Nombre de la categoria: ' . $this->categoria->__get('nombre').'<br>';
    }
}
?>