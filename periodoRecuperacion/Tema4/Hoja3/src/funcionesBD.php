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

    function getAsientos(){
        try{
            $conexion = ConexionBD::getConnection();
            $stmt= $conexion->query("select numero from plazas where reservada=0");
            $resultado=$stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al realizar los cambios: " . $e->getMessage();
            return [];
        }
    }
}
?>