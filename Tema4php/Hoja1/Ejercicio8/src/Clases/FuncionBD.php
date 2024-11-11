<?php
namespace App\Clases;

use App\Clases\ConexionBD;
use PDO;
use PDOException; // Cambiado de DPOException a PDOException

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
            $resultado = $dwes->query('SELECT nombre FROM jugadores where nombre_equipo=' . '"' . $equipo . '"');
            return $resultado->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            echo "Error al obtener a todos los jugadores: " . $e->getMessage();
            return [];
        }
    }


    public static function modificarJugador($nombreViejo,$nombre, $procedencia, $altura, $peso, $posicion)
    {
        try {
            //hacemos la conexion
            $dwes = ConexionBD::getConnection();
            //iniciamos la transaccion(se me olvido)
            $dwes->beginTransaction();
            //preparamos la consulta
            $consulta = $dwes->prepare('update jugadores set nombre=:nombre, procedencia=:procedencia, altura=:altura, peso=:peso, posicion=:posicion where nombre=:nombreViejo');
            //asignamos los campos
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':procedencia', $procedencia);
            $consulta->bindParam(':altura', $altura);
            $consulta->bindParam(':peso', $peso);
            $consulta->bindParam(':posicion', $posicion);
            $consulta->bindParam(':nombreViejo',$nombreViejo);
            //ejercutamos la consulta
            $consulta->execute();
            //si funciona que haga un commit sino un rollback
            $dwes->commit();
            echo("Se cambio el jugador");
        } catch (PDOException $e) {
            //el rollback
            $dwes->rollBack();
            echo "Error al modificar el jugador: " . $e->getMessage();

        }
    }

}
?>