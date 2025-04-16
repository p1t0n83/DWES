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
            $posicion = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $posicion;
        } catch (PDOException $e) {
            echo "Error al obtener las posiciones: " . $e->getMessage();
            return [];
        }
    }
}
