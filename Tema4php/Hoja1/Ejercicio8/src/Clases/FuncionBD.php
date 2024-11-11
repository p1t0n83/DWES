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


    public static function borrarJugador($jugador)
    {
        try {
            //hacemos la conexion
            $dwes = ConexionBD::getConnection();
            //preparamos la consulta
            $consulta = $dwes->prepare('delete from jugadores where nombre=:nombre');
            //asignamos los campos
            $consulta->bindParam(':nombre', $nombre);

            //ejercutamos la consulta
            $consulta->execute();
            echo ("Se borro el jugador");
        } catch (PDOException $e) {
            echo "Error al borrar el jugador: " . $e->getMessage();

        }
    }

    public static function siguienteCodigo()
    {

        try {

            $dwes = ConexionBD::getConnection();
            $consulta = "SELECT MAX(codigo) AS max_codigo FROM jugadores";
            $codigo = $dwes->query($consulta)->fetch(PDO::FETCH_ASSOC);
            return $codigo['max_codigo'] + 1;
        } catch (PDOException $e) {
            echo "Error al obtener el codigo: " . $e->getMessage();

        }
    }


    public static function obtenerEquipo($nombre){
        try{
            $dwes=ConexionBD::getConnection();
            $consulta="select nombre_equipo from jugadores where nombre=:nombre";
            $consulta->bindParam(':nombre',$nombre);
            
        }catch(PDOException $e){
            echo "Error alobtener el codigo: ".$e->getMessage();
        }
    }

    public static function crearJugador($nombre, $procedencia, $altura, $peso, $posicion, $nombre_equipo, $nombreBorrar)
    {

        try {
            //hacemos la conexion
            $dwes = ConexionBD::getConnection();
            //iniciamos la transaccion(se me olvido)
            $dwes->beginTransaction();
            //borramos eljugador
            self::borrarJugador($nombreBorrar);
            //preparamos la consulta
            $consulta = $dwes->prepare('insert into jugadores (codigo,nombre,procedencia,altura,peso,posicion,nombre_equipo) values (:codigo,:nombre,:procedencia,:altura,:peso,:posicion,:nombre_equipo)');
            //asignamos los campos
            $codigo = self::siguienteCodigo();
            $consulta->bindParam(':codigo', $codigo);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':procedencia', $procedencia);
            $consulta->bindParam(':altura', $altura);
            $consulta->bindParam(':peso', $peso);
            $consulta->bindParam(':posicion', $posicion);
            $consulta->bindParam(':nombre_equipo', $nombre_equipo);
            //ejercutamos la consulta
            $consulta->execute();
            //si funciona que haga un commit sino un rollback
            $dwes->commit();
            echo ("Se creo el jugador");
        } catch (PDOException $e) {
            //el rollback
            $dwes->rollBack();
            echo "Error al crear el jugador: " . $e->getMessage();
        }
    }
}
?>