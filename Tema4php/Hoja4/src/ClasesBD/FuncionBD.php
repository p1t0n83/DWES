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
    //tengo que separar la funcion en varias, para que sea mas optimo
    public static function getProductos($tipo)
    {
        try {
            $categorias = self::getCategorias();
            $productos = []; // Array para almacenar los objetos de productos
            $dwes = ConexionBD::getConnection();
            $sql = self::obtenerConsultaSegunCategoria($tipo);
            $resultado = $dwes->query($sql);
            $producto = null;
            while ($columna = $resultado->fetch(PDO::FETCH_OBJ)) {
                $categoria = new Categoria($columna->categoria_id, $columna->categoria_nombre);
                $producto = self::getProducto($tipo, $columna, $categoria); // Añadir al array de productos
                $productos[] = $producto; // Añadir al array de productos
                continue; // Continuar con la siguiente iteración si ya añadimos un producto
            }
            // Evitar duplicados (no es necesario si ya estamos añadiendo cada tipo por separado)
            if (!in_array($producto, $productos)) {
                $productos[] = $producto;
            }

            return $productos;
        } catch (PDOException $e) {
            echo "Error al obtener los productos: " . $e->getMessage();
            return [];
        }
    }


    public static function obtenerConsultaSegunCategoria($tipo): string
    {
        try {
            if ($tipo === "alimentacion") {
                $sql = 'SELECT productos.id, productos.nombre, productos.precio, productos.categoria_id,
                            alimentacion.mes_caducidad, alimentacion.anio_caducidad,
                            categorias.id AS categoria_id, categorias.nombre AS categoria_nombre
                        FROM productos
                        INNER JOIN alimentacion ON productos.id = alimentacion.id
                        INNER JOIN categorias ON productos.categoria_id = categorias.id';
            } elseif ($tipo === "electronica") {
                $sql = 'SELECT productos.id, productos.nombre, productos.precio, productos.categoria_id,
                            electronica.plazo_garantia,
                            categorias.id AS categoria_id, categorias.nombre AS categoria_nombre
                        FROM productos
                        INNER JOIN electronica ON productos.id = electronica.id
                        INNER JOIN categorias ON productos.categoria_id = categorias.id';
            } elseif ($tipo === "todos") {
                $sql = 'SELECT productos.id, productos.nombre, productos.precio, productos.categoria_id,
                            alimentacion.mes_caducidad, alimentacion.anio_caducidad,
                            electronica.plazo_garantia,
                            categorias.id AS categoria_id, categorias.nombre AS categoria_nombre
                        FROM productos
                        LEFT JOIN alimentacion ON productos.id = alimentacion.id
                        LEFT JOIN electronica ON productos.id = electronica.id
                        INNER JOIN categorias ON productos.categoria_id = categorias.id';
            }
            return $sql;
        } catch (PDOException $e) {
            echo "Error al obtener la consulta: " . $e->getMessage();
            return null;
        }
    }

    public static function getProducto($tipo, $columna, $categoria)
    {
        $producto=null;
        try {
            // Crear el objeto dependiendo del tipo
            if ($tipo === "alimentacion" && $columna->mes_caducidad !== null) {
                $producto = new Alimentacion(
                    $columna->mes_caducidad,
                    $columna->anio_caducidad,
                    $columna->id,
                    $columna->precio,
                    $columna->nombre,
                    $categoria
                );
            } elseif ($tipo === "electronica" && $columna->plazo_garantia !== null) {
                $producto = new Electronica(
                    $columna->plazo_garantia,
                    $columna->id,
                    $columna->precio,
                    $columna->nombre,
                    $categoria
                );
            } else {
                if ($columna->mes_caducidad !== null) {
                    $producto = new Alimentacion(
                        $columna->mes_caducidad,
                        $columna->anio_caducidad,
                        $columna->id,
                        $columna->precio,
                        $columna->nombre,
                        $categoria
                    );
                } else {

                    if ($columna->plazo_garantia !== null) {
                        $producto = new Electronica(
                            $columna->plazo_garantia,
                            $columna->id,
                            $columna->precio,
                            $columna->nombre,
                            $categoria
                        );
                    }
                }
            }
           return $producto;
        } catch (PDOException $e) {
            echo "Error al obtener el producto: " . $e->getMessage();
            return null;
        }
    }

    public static function getCategorias()
    {
        $conexion = ConexionBD::getConnection();
        $categorias = [];

        if ($conexion) {
            $query = $conexion->query("SELECT id,nombre from categorias");
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                $categorias[] = new Categoria($row->id, $row->nombre);
            }
        }
        return $categorias;
    }
}

?>