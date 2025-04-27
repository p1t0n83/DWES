<?php
namespace Ejercicio0405\ClasesBD;
use Ejercicio0405\Interfaces\Metodos;
use Ejercicio0405\Clases\Producto;
use Ejercicio0405\ClasesBD\ConexionBD;
use PDO;
use PDOException;
class FuncionesBD 
{
   

    function getFamilias()
    {
        try {
            $stmt = ConexionBD::getConnection();

            $resultado = $stmt->query('SELECT idfamilias,nombre FROM familias');
            $familias = $resultado->fetchAll(PDO::FETCH_OBJ);
            var_dump($familias);
            return $familias;
        } catch (PDOException $e) {
            echo "Error al obtener las familias: " . $e->getMessage();
            return [];
        }
    }
function crearImagen($idProducto, $nombre): bool
{
    try {
        $stmt = ConexionBD::getConnection();
        $consulta = $stmt->prepare('INSERT INTO imagenes(producto, nombre) VALUES (:producto, :nombre)');
        var_dump($idProducto, $nombre);
        $consulta->bindParam(':producto', $idProducto);
        $consulta->bindParam(':nombre', $nombre);
        
        return $consulta->execute();
    } catch (PDOException $e) {
        echo "Error al guardar la imagen: " . $e->getMessage();
        return false;
    }
}
}

?>