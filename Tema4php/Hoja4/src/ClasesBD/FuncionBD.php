<?php
namespace App\ClasesBD;
// como conexion esta en la misma carpeta se puede quitar
use PDOException;
use PDO;
use App\Clases\Categoria;
use App\Clases\Alimentacion;
use App\Clases\Electronica;
class FuncionBD
{



    public static function getProductos($tipo): array
    {
        try {
            $productos = [];  // Array para almacenar los objetos de productos

            $dwes = ConexionBD::getConnection();

            if ($tipo === "alimentacion") {
                $resultado = $dwes->query('SELECT DISTINCT productos.id, productos.nombre, productos.precio, productos.categoria_id, alimentacion.mes_caducidad, alimentacion.anio_caducidad, categorias.id AS categoria_id, categorias.nombre AS categoria_nombre
                    FROM productos
                    INNER JOIN alimentacion ON productos.id = alimentacion.id
                    INNER JOIN categorias ON productos.categoria_id = categorias.id');

                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria($row['categoria_id'], $row['categoria_nombre']);
                    $producto = new Alimentacion($row['mes_caducidad'], $row['anio_caducidad'], $row['id'], $row['precio'], $row['nombre'], $categoria);
                    // Al agregar productos, asegúrate de que no se repitan
                    if (!in_array($producto, $productos)) {
                        $productos[] = $producto;
                    }

                }

            } else if ($tipo === "electronica") {
                $resultado = $dwes->query('SELECT DISTINCT productos.id, productos.nombre, productos.precio, productos.categoria_id, electronica.plazo_garantia, categorias.id AS categoria_id, categorias.nombre AS categoria_nombre
                    FROM productos
                    INNER JOIN electronica ON productos.id = electronica.id
                    INNER JOIN categorias ON productos.categoria_id = categorias.id');

                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria($row['categoria_id'], $row['categoria_nombre']);
                    $producto = new Electronica($row['plazo_garantia'], $row['id'], $row['precio'], $row['nombre'], $categoria);
                    // Al agregar productos, asegúrate de que no se repitan
                    if (!in_array($producto, $productos)) {
                        $productos[] = $producto;
                    }

                }

            } else {
                $resultado = $dwes->query('SELECT DISTINCT productos.id, productos.nombre, productos.precio, productos.categoria_id,
                    COALESCE(alimentacion.mes_caducidad, NULL) AS mes_caducidad,
                    COALESCE(alimentacion.anio_caducidad, NULL) AS anio_caducidad,
                    COALESCE(electronica.plazo_garantia, NULL) AS plazo_garantia,
                    categorias.id AS categoria_id, categorias.nombre AS categoria_nombre
                    FROM productos
                    LEFT JOIN alimentacion ON productos.id = alimentacion.id
                    LEFT JOIN electronica ON productos.id = electronica.id
                    INNER JOIN categorias ON productos.categoria_id = categorias.id');

                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $categoria = new Categoria($row['categoria_id'], $row['categoria_nombre']);

                    // Verificamos si es un producto de alimentación
                    if ($row['mes_caducidad'] !== null) {
                        $producto = new Alimentacion($row['mes_caducidad'], $row['anio_caducidad'], $row['id'], $row['precio'], $row['nombre'], $categoria);
                    }
                    // Verificamos si es un producto de electrónica
                    elseif ($row['plazo_garantia'] !== null) {
                        $producto = new Electronica($row['plazo_garantia'], $row['id'], $row['precio'], $row['nombre'], categoria: $categoria);
                    }
                    // Al agregar productos, asegúrate de que no se repitan
                    if (!in_array($producto, $productos)) {
                        $productos[] = $producto;
                    }

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