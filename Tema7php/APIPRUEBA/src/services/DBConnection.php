<?php
 
namespace App\services;
 
use PDO;
use PDOException;
 
class DBConnection {
    private static ?DBConnection $instance = null;
    private static ?PDO $conexion = null;
 
    // Constructor privado para evitar la instanciación directa
    private function __construct() {
        try {
            if (self::$conexion === null) {
                self::$conexion = new PDO(
                    $_ENV['DB_DSN'],
                    $_ENV['DB_USERNAME'],
                    $_ENV['DB_PASSWORD']
                );
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
 
    // Método para obtener la instancia única de la clase (patrón Singleton)
    public static function getInstance(): DBConnection {
        if (self::$instance === null) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }
 
    // Método para obtener la conexión PDO
    public static function getConexion(): ?PDO {
        if (self::$conexion === null) {
            self::getInstance();
        }
        return self::$conexion;
    }
}