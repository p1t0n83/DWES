<?php
namespace App\Clases;
use App\Clases\ConexionBD;
use PDO;
use PDOException;
  class FuncionesBD{


    function getEquipos(){
        
        try{
            $dwes = ConexionBD::getConnection();
            $resultado=$dwes->query('SELECT nombre FROM equipos');
            $equipos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $equipos;
        }catch(PDOException $e){
            echo "Error al obtener los equipos: " . $e->getMessage();
            return [];
        }
    }
  }
?>