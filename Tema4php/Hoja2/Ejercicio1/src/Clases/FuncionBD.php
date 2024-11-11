<?php
namespace App\Clases;

use App\Clases\ConexionBD;
use PDO;
use PDOException; // Cambiado de DPOException a PDOException
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
    
    public static function agregarLibro($titulo,$edicion,$precio,$adquisicion)
    {
        function esFechaValida($fechaAdquisicion) {
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

        if(esFechaValida($adquisicion)){
        try {
            
            //hacemos la conexion
            $dwes = ConexionBD::getConnection();
            //iniciamos la transaccion
            $dwes->beginTransaction();
            //preparamos la consulta
            $consulta = $dwes->prepare('INSERT INTO libros (titulo, anyo_edicion, precio, fecha_adquisicion) VALUES (:titulo, :edicion, :precio, :adquisicion)');
            //asignamos los campos
            $consulta->bindParam(':titulo', $titulo);
            $consulta->bindParam(':edicion', $edicion);
            $consulta->bindParam(':precio', $precio);
            $consulta->bindParam(':adquisicion', $adquisicion);
            
            //ejercutamos la consulta
            $consulta->execute();
            //si funciona que haga un commit sino un rollback
            $dwes->commit();
            echo("Se agrego el libro");
        } catch (PDOException $e) {
            //el rollback
            $dwes->rollBack();
            echo "Error al agregar el libro: " . $e->getMessage();

        }
    }else{
        echo('La fecha de adquision no es valida');
    }
}
}
?>