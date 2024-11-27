<?php
namespace App\Clases;

use App\Interfaces\InterfazProducto;
use PDOException;
use App\ClasesBD\FuncionBD;
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
        $query = "CREATE TABLE IF NOT EXISTS products  (
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
            $query = 'INSERT INTO products(nombre,precio,descripcion,imagen)
            VALUES(:nombre,:precio,:descripcion,:imagen)';
            $stmt = $con->prepare($query);
            $stmt->bindParam(':nombre',$producto->getNombre());
            $stmt->bindParam(':precio',$producto->getPrecio());
            $stmt->bindParam(':descripcion',$producto->getDescripcion());
            $stmt->bindParam(':imagen',$producto->getImagen());
            // si logro ejecutarse que se guarden las columnas afectadas
            if ($stmt->execute()) {
                $result = $stmt->rowCount() === 1;
            }
        } catch (PDOException $e) {
            throw new PDOException('Algo fallo en la creacion del producto ' . $e->getMessage());
        }
        return $result;
    }

}

?>