<?php
namespace App\Clases;

use App\Interfaces\InterfazProducto;
use PDOException;
use PDO;
use App\ClasesBD\FuncionBD;
use App\ClasesBD\ConexionBD;
class PDOCrearProducto implements InterfazProducto
{

    private function crearTablaProducto(string $query): bool
    {
        $response = false;
        try {
            $response = FuncionBD::queryDB($query);
        } catch (PDOException $pdo_e) {
            throw new PDOException('-PDOProduct->createTableProduct() ' . $pdo_e->getMessage());
        }
        return $response;
    }

    public function __construct()
    {
        // nos pide crear la tabla si no existe
        $query = "CREATE TABLE IF NOT EXISTS productos  (
                    id int(11) NOT NULL AUTO_INCREMENT COMMENT 'productos con id auto incrementado',
                    nombre varchar(100) NOT NULL  COMMENT 'Nombre de los productos',
                    precio double NOT NULL COMMENT 'Precio de los productos',
                    descripcion text NOT NULL COMMENT 'Descripcion de los productos',
                    imagen varchar(255) DEFAULT NULL COMMENT 'URL de la imagen',
                    PRIMARY KEY(id)
                );";
        $this->crearTablaProducto($query);
    }


    public function crear(Modeloproducto $producto): bool
    {
        try {
            $con = ConexionBD::getConnection();
            $query = 'INSERT INTO productos(nombre,precio,descripcion,imagen)
            VALUES(:nombre,:precio,:descripcion,:imagen)';
            $stmt = $con->prepare($query);
            $nombre=$producto->getNombre();
            $stmt->bindParam(':nombre',$nombre);
            $precio=$producto->getPrecio();
            $stmt->bindParam(':precio',$precio);
            $descripcion=$producto->getDescripcion();
            $stmt->bindParam(':descripcion',$descripcion);
            $imagen=$producto->getImagen();
            $stmt->bindParam(':imagen',$imagen);
            // si logro ejecutarse que se guarden las columnas afectadas
            if ($stmt->execute()) {
                $result = $stmt->rowCount() === 1;
            }
        } catch (PDOException $e) {
            throw new PDOException('Algo fallo en la creacion del producto ' . $e->getMessage());
        }
        return $result;
    }

    public static function obtenerProductos():array{
        try{
            $productos = []; 
            $dwes = ConexionBD::getConnection();
            $sql = 'SELECT nombre,descripcion,precio,imagen FROM productos';
            $resultado = $dwes->query($sql);
            $producto = null;
            while ($columna = $resultado->fetch(PDO::FETCH_OBJ)) {      
                $producto = new Modeloproducto($columna->nombre,$columna->descripcion,$columna->precio,$columna->imagen);
                $productos[] = $producto; 
            }
            // Evitar duplicados (no es necesario si ya estamos añadiendo cada tipo por separado)
            if (!in_array($producto, $productos)) {
                $productos[] = $producto;
            }
            return $productos;
        }catch(PDOException $e){
            throw new PDOEXception('Algo fallo en la obtencion de los productos '. $e->getMessage());
        }
    }

}

?>