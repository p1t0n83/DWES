<?php
namespace App\Clases;

use App\Clases\ConexionBD;
use PDO;
use PDOException; // Cambiado de DPOException a PDOException

class FuncionBD
{
    public static function insertarUsuario($usuario, $password)
    {
        try {
            $dwes = ConexionBD::getConnection();
            $resultado = $dwes->prepare('Insert into usuarios(usuario,password) values (:usuario,:password)');
            $resultado->bindParam(":usuario", $usuario);
            $resultado->bindParam(":password", $password);
            $resultado->execute();

        } catch (PDOException $e) {
            echo "Error al insertar usuario: " . $e->getMessage();

        }
    }

    public static function verificarUsuario($usuario,$password){
        try {
            $dwes = ConexionBD::getConnection();
            $stmt = $dwes->prepare("SELECT password FROM usuarios WHERE usuario = ?");
            $stmt->execute([$usuario]);
            $hashedPassword = $stmt->fetchColumn();
            if (password_verify($password, $hashedPassword)) {
                
                return true;
            } else {
               
                return false;
            }
             
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function plazasLibres()
    {
        try {
            $dwes = ConexionBD::getConnection();
            $resultado = $dwes->query('SELECT numero,precio FROM plazas where reservada=0');
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "No se han podido conseguir las plazas libres: " . $e->getMessage();
            return [];
        }
    }

    public static function reservarPlaza($nombre, $DNI, $sexo, $asiento)
    {
        try {
            // Obtener la conexión a la base de datos
            $dwes = ConexionBD::getConnection();

            // Verificar si el DNI ya existe en la base de datos
            $stmt = $dwes->prepare('SELECT COUNT(*) FROM pasajeros WHERE DNI = :dni');
            $stmt->bindParam(':dni', $DNI, PDO::PARAM_STR); // Asegúrate de que el DNI sea un string
            $stmt->execute();
            $DNIExiste = $stmt->fetchColumn();

            if ($DNIExiste > 0) {
                echo "El DNI ya está registrado en la base de datos.";
            } else {
                // Iniciar transacción
                $dwes->beginTransaction();

                // Insertar los datos en la tabla pasajeros
                $stmt = $dwes->prepare('INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (:dni, :nombre, :sexo, :asiento)');
                $stmt->bindParam(':dni', $DNI, PDO::PARAM_STR);
                $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR); // Asegúrate de que `sexo` sea un valor adecuado
                $stmt->bindParam(':asiento', $asiento, PDO::PARAM_INT);
                $stmt->execute();
                $salida1 = $stmt->rowCount();
                // Actualizar la plaza como reservada
                $stmt = $dwes->prepare('UPDATE plazas SET reservada = 1 WHERE numero = :asiento');
                $stmt->bindParam(':asiento', $asiento, PDO::PARAM_INT);
                $stmt->execute();
                $salida2 = $stmt->rowCount();
                // Confirmar la transacción
                if ($salida1 === 1 && $salida2 === 1) {
                    $dwes->commit();
                    echo "La plaza ha sido reservada con éxito.";
                } else {
                    throw new PDOException("No se han insertado/actualizado correctamente las sentencias");
                }
            }
        } catch (PDOException $e) {
            $dwes->rollBack();
            echo "No se ha podido realizar la reserva de la plaza: " . $e->getMessage();
        }
    }



    public static function Llegada(): void
    {
        try {
            $dwes = ConexionBD::getConnection();
            $dwes->beginTransaction();
            $consulta = $dwes->prepare('update plazas set reservada=0 where reservada=1');
            $consulta->execute();
            $salida1 = $consulta->rowCount();
            $consulta = $dwes->prepare("delete from pasajeros");
            $consulta->execute();
            $salida2 = $consulta->rowCount();
            if ($salida1 === $salida2) {
                echo "Se han podido realizar los cambios";
                $dwes->commit();
            } else {
                throw new PDOException('No se han podido eliminar/actualizar las tablas');
            }
        } catch (PDOException $e) {
            $dwes->rollBack();
            echo "No se han podido hacer los cambios: " . $e->getMessage();
        }
    }


    public static function plazas()
    {
        try {
            $dwes = ConexionBD::getConnection();
            $resultado = $dwes->query('SELECT numero,precio FROM plazas ');
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "No se han podido conseguir las plazas libres del tren: " . $e->getMessage();
            return [];
        }
    }

    public static function actualizarPlazas(array $plazas)
    {
        try {
            $dwes = ConexionBD::getConnection();
            $dwes->beginTransaction();

            // Actualizar el precio de cada plaza
            $stmt = $dwes->prepare('UPDATE plazas SET precio = :precio WHERE numero = :numero');

            foreach ($plazas as $numero => $precio) {
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':numero', $numero);
                $stmt->execute();
            }
            $filasActualizadas = $stmt->rowCount();
            // Confirmar la transacción
            if ($filasActualizadas === count($plazas)) {
                $dwes->commit();
                echo "Los precios de las plazas han sido actualizados con éxito.";
            } else {
                throw new PDOException("No se han actualizado las plazas");
            }

        } catch (PDOException $e) {
            $dwes->rollBack();
            echo "No se han podido actualizar los precios de las plazas: " . $e->getMessage();
        }
    }

}
?>