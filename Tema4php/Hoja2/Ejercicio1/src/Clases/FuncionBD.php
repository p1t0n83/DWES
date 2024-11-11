<?php
namespace App\Clases;
// como conexion esta en la misma carpeta se puede quitar
use App\Clases\ConexionBD;
use PDO;
use PDOException; 
use DateTime;
class FuncionBD
{
    public static function getLibros(): array
    {
        try {
            $dwes = ConexionBD::getConnection();
            $resultado = $dwes->query('SELECT numero_ejemplar,titulo,anyo_edicion,precio,fecha_adquisicion FROM libros');
            return $resultado->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error al obtener los libros: " . $e->getMessage();
            return [];
        }
    }
    public static function esFechaValida($fechaAdquisicion) {
        // Convertimos la fecha de adquisición a un objeto DateTime
        $fechaAdquisicion = new DateTime($fechaAdquisicion);
        
        // Obtenemos la fecha actual
        $fechaActual = new DateTime();
        
        // Comparamos la fecha de adquisición con la fecha actual
        if ($fechaAdquisicion < $fechaActual) {
            return true; // La fecha de adquisición es válida
        } else {
            return false; // La fecha de adquisición no es válida
        }
    }
    public static function agregarLibro($titulo,$edicion,$precio,$adquisicion):void
    {
        if(self::esFechaValida($adquisicion)){
        try { 
            //hacemos la conexion
            $dwes = ConexionBD::getConnection();
            //iniciamos la transaccion, que no hace falta
            //$dwes->beginTransaction();
            //preparamos la consulta
            $consulta = $dwes->prepare('INSERT INTO libros (titulo, anyo_edicion, precio, fecha_adquisicion) VALUES (:titulo, :edicion, :precio, :adquisicion)');
            //asignamos los campos
            $consulta->bindParam(':titulo', $titulo);
            $consulta->bindParam(':edicion', $edicion);
            $consulta->bindParam(':precio', $precio);
            $consulta->bindParam(':adquisicion', $adquisicion);
            //ejecutamos la consulta
            $consulta->execute();
            //devuelve el id $dwes->lastInsertId();
            //si funciona que haga un commit sino un rollback
            //$dwes->commit();
            echo "Se agrego el libro";
        } catch (PDOException $e) {
            //el rollback
            //$dwes->rollBack();
            echo "Error al agregar el libro: " . $e->getMessage();
        }
    }else{
        echo('La fecha de adquision no es valida');
    }
}
}
?>