<?php
namespace App\clases;
use App\Clases\Categoria;
class Producto
{
    protected $codigo;
    protected $precio;
    protected $nombre;
    
    protected Categoria $categoria;

    function __construct($codigo,$precio,$nombre,$categoria){
        $this->codigo=$codigo;
        $this->precio=$precio;
        $this->nombre=$nombre;
        $this->categoria=$categoria;
    }

    function __tostring(){
        return "Código: {$this->codigo}, Nombre: {$this->nombre}, Precio: {$this->precio}, Categoría: {$this->categoria->getNombre()}";
 }
}
?>