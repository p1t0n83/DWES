<?php
namespace App;

use App\ConexionBD;
use PDOException;
USE PDO;    
class FuncionesBD{
    
    function ingresarLibro($titulo,$anio,$precio,$fecha){
        try{
            $conexion=ConexionBD::getConnection();
            $stmt=$conexion->prepare('INSERT INTO libros(titulo,anyo_edicion,precio,fecha_adquisicion) VALUES (:titulo,:anyo_edicion,:precio,:fecha_adquisicion)');
            $stmt->bindParam(':titulo',$titulo);
            $stmt->bindParam(':anyo_edicion',$anio);
            $stmt->bindParam(':precio',$precio);
            $stmt->bindParam(':fecha_adquisicion',$fecha);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            echo "Error al guardar el libro: " . $e->getMessage();
            return false;
        }
    }

    function getLibros(){
        try{
            $conexion=ConexionBD::getConnection();
            $stmt=$conexion->query('SELECT titulo,anyo_edicion,precio,fecha_adquisicion FROM libros');
            $resultado=$stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al guardar el libro: " . $e->getMessage();
            return [];
        }
    }
}
?>