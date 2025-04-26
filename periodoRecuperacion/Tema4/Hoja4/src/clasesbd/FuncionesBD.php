<?php
namespace App\clasesbd;

use App\clasesbd\ConexionBD;
use PDOException;
use PDO;
use App\clases\Categoria;
class FuncionesBD
{

    public function getProductos()
{
    try {
        $conexion = ConexionBD::getConnection();
        $productos = [];

        // Consulta única con LEFT JOIN para obtener todos los datos
        $stmt = $conexion->query("
            SELECT 
                p.idproducto, p.nombre, p.precio, c.nombre AS categoria,
                a.mesCaducidad, a.anioCaducidad,
                e.plazoGarantia
            FROM productos p
            JOIN categorias c ON p.categoria = c.idcategoria
            LEFT JOIN alimentacion a ON p.idproducto = a.idalimentacion
            LEFT JOIN electronica e ON p.idproducto = e.idelectronica
        ");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $row) {
            $categoria = new Categoria($row['categoria']);

            if (!is_null($row['mesCaducidad']) && !is_null($row['anioCaducidad'])) {
                // Crear un objeto de la clase Alimentacion
                $productos[] = new \App\clases\Alimentacion(
                    $row['idproducto'],
                    $row['precio'],
                    $row['nombre'],
                    $categoria,
                    $row['mesCaducidad'],
                    $row['anioCaducidad']
                );
            } elseif (!is_null($row['plazoGarantia'])) {
                // Crear un objeto de la clase Electronica
                $productos[] = new \App\clases\Electronica(
                    $row['idproducto'],
                    $row['precio'],
                    $row['nombre'],
                    $categoria,
                    $row['plazoGarantia']
                );
            }
        }

        return $productos;
    } catch (PDOException $e) {
        echo "Error al obtener los productos: " . $e->getMessage();
        return [];
    }
}
}
?>