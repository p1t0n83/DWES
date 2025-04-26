<?php
namespace App;

use App\ConexionBD;
use PDOException;
use PDO;
class FuncionesBD
{

    function llegada()
    {
        try {
            $conexion = ConexionBD::getConnection();
            $conexion->beginTransaction();
            $conexion->query("UPDATE PLAZAS SET reservada=0");
            $conexion->query("DELETE FROM pasajeros");
            $conexion->commit();
            echo "Exito al llegar";
        } catch (PDOException $e) {
            echo "Error al realizar los cambios: " . $e->getMessage();
            $conexion->rollBack();
        }
    }

    function getAsientos()
    {
        try {
            $conexion = ConexionBD::getConnection();
            $stmt = $conexion->query("select numero,precio from plazas where reservada=0");
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } catch (PDOException $e) {
            echo "Error al realizar los cambios: " . $e->getMessage();
            return [];
        }
    }

    function reserva($nombre, $dni, $asiento)
    {
        try {
            $conexion = ConexionBD::getConnection();
            $conexion->beginTransaction();
            $stmt = $conexion->prepare("INSERT INTO pasajeros(dni,nombre,numero_plaza,sexo) values (:dni,:nombre,:asiento,1)");
            $stmt->bindParam(":dni", $dni);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":asiento", $asiento);
            $stmt->execute();
            $stmt = $conexion->prepare("update plazas set reservada=1 where numero=:asiento");
            $stmt->bindParam(":asiento", $asiento);
            $stmt->execute();
            $conexion->commit();

            return true;
        } catch (PDOException $e) {
            echo "Error al realizar la reserva: " . $e->getMessage();
            $conexion->rollBack();
            return false;
        }
    }

    function actualizarPrecios($asientos)
    {
        try {
            $conexion = ConexionBD::getConnection();
            $conexion->beginTransaction();
            foreach($asientos as $numero => $precio){
              $stmt=$conexion->prepare("UPDATE plazas SET precio = :precio WHERE numero = :numero");
              $stmt->bindParam('numero',$numero);
              $stmt->bindParam('precio',$precio);
              $stmt->execute();
            }
            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            echo "Error al realizar los cambios: " . $e->getMessage();
            $conexion->rollBack();
            return false;
        }
    }
}
?>