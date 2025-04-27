<?php
// filepath: c:\Users\rompe\OneDrive\Documentos\DWES\periodoRecuperacion\Actividad0405\src\ClasesBD\PDOProducto.php
namespace Ejercicio0405\ClasesBD;

use Ejercicio0405\Interfaces\IntRepoProducto;
use Ejercicio0405\Clases\Producto;
use PDO;
use PDOException;

class PDOProducto implements IntRepoProducto
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = ConexionBD::getConnection();
    }

    function crear(Producto $producto): bool
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare('INSERT INTO productos(nombre,descripcion,precio,familia) VALUES (:nombre,:descripcion,:precio,:familia)');
            $nombre = $producto->__get("nombre");
            $descripcion = $producto->__get("descripcion");
            $precio = $producto->__get("precio");
            $familia = $producto->__get("familia");
    
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':descripcion', $descripcion);
            $consulta->bindParam(':precio', $precio);
            $consulta->bindParam(':familia', $familia);
            var_dump($nombre, $descripcion, $precio, $familia);
           return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al guardar el producto: " . $e->getMessage();
            return false;
        }
    }

    function listar(): array
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->query('SELECT idproductos, nombre, descripcion, precio, familia FROM productos');
            $productos = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $productos; 
        } catch (PDOException $e) {
            echo "Error al listar los productos: " . $e->getMessage();
            return [];
        }
    }

    function listarPorId($id):?Producto 
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare('SELECT idproductos, nombre, descripcion, precio, familia FROM productos WHERE idproductos = :id');
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $producto = $consulta->fetch(PDO::FETCH_OBJ);
            return $producto ; 
        } catch (PDOException $e) {
            echo "Error al obtener el producto por ID: " . $e->getMessage();
            return null;
        }
    }

    function borrar($id): bool
    {
        try {
            $stmt = ConexionBD::getConnection();
            $consulta = $stmt->prepare('DELETE FROM productos WHERE idproductos = :id');
            $consulta->bindParam(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            echo "Error al borrar el producto: " . $e->getMessage();
            return false;
        }
    }
}