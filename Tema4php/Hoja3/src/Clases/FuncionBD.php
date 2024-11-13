<?php
namespace App\Clases;
// como conexion esta en la misma carpeta se puede quitar
use App\Clases\ConexionBD;
use PDO;
use PDOException;

class FuncionBD
{

    public static function plazasLibres()
    {
    try{

    }catch (PDOException $e) {
            echo "No se han podido conseguir las plazas libres: " . $e->getMessage();
        }
    }

    public static function Llegada(): void
    {
        try {
            $dwes = ConexionBD::getConnection();
            $dwes->beginTransaction();
            $consulta = $dwes->prepare('alter table plazas set reservada=0');
            $consulta->execute();
            $consulta = $dwes->prepare("delete from pasajeros");
            $consulta->execute();
            echo "Se han podido realizar los cambios";
            $dwes->commit();
        } catch (PDOException $e) {
            $dwes->rollBack();
            echo "No se han podido hacer los cambios: " . $e->getMessage();
        }
    }
}
?>