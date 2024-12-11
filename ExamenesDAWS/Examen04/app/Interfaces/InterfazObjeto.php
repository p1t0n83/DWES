<?php
namespace App\Interfaces;
use App\Clases\producto\ModeloProducto;

interface InterfazObjeto{
    //metodo crear producto
    public static function crear(ModeloProducto $producto):bool;
    //metodo listar productos
    public static function listar():array;
    //metodo listar por id
    public static function listarPorId($id):ModeloProducto;
    //metodo borrar por id
    public static function borrar($id):bool;

    public static function getFamilias():array;
}
?>