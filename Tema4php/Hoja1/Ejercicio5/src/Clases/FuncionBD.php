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
    }}

?>