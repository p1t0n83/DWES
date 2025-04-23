<?php

namespace App\Clases;

use App\Clases\ConexionBD;
use PDO;
use PDOException;

class FuncionesBD
{


    function getEquipos()
    {

        try {
            $dwes = ConexionBD::getConnection();
            $resultado = $dwes->query('SELECT nombre FROM equipos');
            $equipos = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $equipos;
        } catch (PDOException $e) {
            echo "Error al obtener los equipos: " . $e->getMessage();
            return [];
        }
    }

    function getJugadores($equipo)
    {
        try {
            $dwes = ConexionBD::getConnection();
            $stmt = $dwes->prepare('SELECT codigo,nombre,peso from jugadores where nombre_equipo=:equipo');
            $stmt->bindParam('equipo', $equipo);
            $stmt->execute();
            $jugadores = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $jugadores;
        } catch (PDOException $e) {
            echo "Error al obtener los equipos: " . $e->getMessage();
            return [];
        }
    }

    function getPosiciones()
    {
        try {
            $dwes = ConexionBD::getConnection();
            $resultado = $dwes->query('SELECT DISTINCT posicion FROM jugadores');
            $posiciones = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $posiciones;
        } catch (PDOException $e) {
            echo "Error al obtener las posiciones: " . $e->getMessage();
            return [];
        }
    }


    function traspaso($id, $nombre, $procedencia, $peso, $altura, $posicion)
    {
        try {
            $dwes = ConexionBD::getConnection();
            $dwes->beginTransaction();

            
            $stmt = $dwes->prepare('DELETE FROM estadisticas WHERE jugador = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

        
            $stmt = $dwes->prepare('DELETE FROM jugadores WHERE codigo = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $dwes->prepare('INSERT INTO jugadores (nombre, procedencia, peso, altura, posicion) VALUES (:nombre, :procedencia, :peso, :altura, :posicion)');
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':procedencia', $procedencia);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':altura', $altura);
            $stmt->bindParam(':posicion', $posicion);
            $stmt->execute();

            // Confirmar la transacción
            $dwes->commit();
            return true;
        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $dwes->rollBack();
            echo "Error al realizar el traspaso: " . $e->getMessage();
            return false;
        }
    }

    function actualizarPesos($pesos, $equipo)
    {
        try {
            $dwes = ConexionBD::getConnection();

            // Recorrer el array de pesos y actualizar cada jugador
            foreach ($pesos as $codigo => $peso) {
                $stmt = $dwes->prepare('UPDATE jugadores SET peso = :peso WHERE codigo = :codigo AND nombre_equipo = :equipo');
                $stmt->bindParam(':peso', $peso, PDO::PARAM_STR);
                $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
                $stmt->bindParam(':equipo', $equipo, PDO::PARAM_STR);
                $stmt->execute();
            }

            echo "Pesos actualizados correctamente.";
            return true;
        } catch (PDOException $e) {
            echo "Error al realizar el cambio de pesos: " . $e->getMessage();
            return false;
        }
    }
}
