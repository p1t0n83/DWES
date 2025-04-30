<?php
namespace Ejercicio0405\clases;
use Ejercicio0405\clases\BaseDatos;
use Ejercicio0405\Interfaces\IntRepoProducto;
use Ejercicio0405\clases\Producto;
use PDO;
use PDOException;
class PDOProducto implements IntRepoProducto
{


    function crear(Producto $producto, $nombreImagen): bool
    {
        try {
            $conexion = BaseDatos::getConnection();
            $conexion->beginTransaction();
            $stmt = $conexion->prepare('INSERT INTO productos (nombre, descripcion, precio, familia) VALUES (:nombre, :descripcion, :precio, :familia)');
            $nombre = $producto->__get("nombre");
            $stmt->bindParam(":nombre", $nombre);
            $descripcion = $producto->__get("descripcion");
            $stmt->bindParam(":descripcion", $descripcion);
            $precio = $producto->__get("precio");
            $stmt->bindParam(":precio", $precio);
            $familia = $producto->__get("familia");
            $stmt->bindParam(":familia", $familia);
            $stmt->execute();
            $producto = $conexion->lastInsertId();
            $this->crearImagenes($nombreImagen, $producto);
            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            echo "Error al crear el producto: " . $e->getMessage();
            $conexion->rollBack();
            return false;
        }
    }

    function crearImagenes($nombre, $producto)
    {
        try {
            $conexion = BaseDatos::getConnection();
            $stmt = $conexion->prepare('INSERT INTO imagenes(nombre,producto) VALUES (:nombre,:producto)');
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":producto", $producto);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al crear la imagen: " . $e->getMessage();
            return false;
        }
    }

    function listar(): array
    {
        try {
            $conexion = BaseDatos::getConnection();
            $resultado = $conexion->query('SELECT p.idproductos, p.nombre, p.descripcion, p.precio, p.familia, i.nombre AS imagen 
                 FROM productos AS p
                 INNER JOIN imagenes AS i ON p.idproductos = i.producto');
            $productos = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        } catch (PDOException $e) {
            echo "Error al crear la imagen: " . $e->getMessage();
            return [];
        }
    }

    function listarPorId($id): Producto
    {
        try {
            $conexion = BaseDatos::getConnection();
            $stmt = $conexion->prepare('
            SELECT 
                p.idproductos, 
                p.nombre, 
                p.descripcion, 
                p.precio, 
                p.familia, 
                i.nombre AS imagen 
            FROM productos AS p
            LEFT JOIN imagenes AS i ON p.idproductos = i.producto
            WHERE p.idproductos = :id
        ');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);

            // Verificar si se encontró el producto
            if ($resultado) {
                $producto = new Producto(
                    $resultado->nombre, 
                    $resultado->precio, 
                    $resultado->familia, 
                    $resultado->descripcion, 
                    $resultado->imagen // Aquí se devuelve el nombre de la imagen
                );
                return $producto;
            } else {
                return null; // No se encontró el producto
            }
        } catch (PDOException $e) {
            echo "Error al obtener el producto por ID: " . $e->getMessage();
            return null;
        }
    }

    function borrar($id): bool
    {
        try {
            $conexion = BaseDatos::getConnection();
            $stmt = $conexion->prepare('DELETE FROM productos where idproductos=:id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al borrar el producto: " . $e->getMessage();
            return false;
        }
    }

    function getFamilias()
    {
        try {
            $conexion = BaseDatos::getConnection();
            $stmt = $conexion->query("SELECT idfamilias, nombre FROM familias");
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error al borrar el producto: " . $e->getMessage();
            return [];
        }
    }

    function verificarUsuario($usuario, $password): bool
    {
        try {
            $conexion = BaseDatos::getConnection();
            $stmt = $conexion->prepare('SELECT password FROM usuarios WHERE nombre = :usuario');
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);

            // Verificar si se encontró el usuario y si la contraseña coincide
            if ($resultado && password_verify($password, $resultado->password)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al verificar el usuario: " . $e->getMessage();
            return false;
        }
    }

   function registrarUsuario($usuario,$password){
           try{
            $conexion = BaseDatos::getConnection();
            $stmt=$conexion->prepare("insert into usuarios(nombre,password) values (:usuario,:password)");  
            $contrasena=password_hash($password,PASSWORD_BCRYPT);
            $stmt->bindParam(':usuario',$usuario);
            $stmt->bindParam(':password',$contrasena);
            echo "Se creo bien";
            return $stmt->execute();
           }catch (PDOException $e) {
            echo "Error al crear el usuario: " . $e->getMessage();
            return false;
        }
   }

}

?>