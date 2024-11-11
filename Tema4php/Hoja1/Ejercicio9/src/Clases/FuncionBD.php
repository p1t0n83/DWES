<?php
namespace App\Clases;

use App\Clases\ConexionBD;
use PDO;
use PDOException;

class FuncionBD
{
    public static function getEquipos(): array
    {
        try {
            $dwes = ConexionBD::getConnection();
            $resultado = $dwes->query('SELECT nombre FROM equipos');
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los equipos: " . $e->getMessage();
            return [];
        }
    }

    public static function getJugadoresEquipo($equipo)
    {
        try {
            $dwes = ConexionBD::getConnection();
            $query = $dwes->prepare('SELECT nombre, peso FROM jugadores WHERE nombre_equipo = :equipo');
            $query->bindParam(':equipo', $equipo);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los jugadores: " . $e->getMessage();
            return [];
        }
    }

    public static function actualizarPesos($jugadores)
    {
        try {
            $dwes = ConexionBD::getConnection();
            $dwes->beginTransaction();
            $consulta = $dwes->prepare('UPDATE jugadores SET peso = :peso WHERE nombre = :nombre');
            
            foreach ($jugadores as $jugador) {
                $consulta->bindParam(':peso', $jugador['peso']);
                $consulta->bindParam(':nombre', $jugador['nombre']);
                $consulta->execute();
            }

            $dwes->commit();  // Confirmar los cambios
            echo "Pesos actualizados correctamente.";
        } catch (PDOException $e) {
            $dwes->rollBack();  // Revertir los cambios si ocurre un error
            echo "Error al actualizar los pesos: " . $e->getMessage();
        }
    }
}
?>