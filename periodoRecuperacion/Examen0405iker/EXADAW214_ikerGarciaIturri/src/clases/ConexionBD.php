<?php
namespace App\clases;
use PDO;
use PDOException;
$dotenv=\Dotenv\Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();
final class ConexionBD{

    private static ?PDO $connection=null;

    final private function __construct(){}

    final public static function getConnection():?PDO{
        try{
            if(!self::$connection){
                self::$connection=new PDO(dsn:$_ENV['DB_DSN'],username:$_ENV['DB_USERNAME'],password:$_ENV['DB_PASSWORD']);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            }catch(PDOException $error){
               echo match($error->getCode()){
                1049=>'Base de datos no encontrada',
                1045=>'Acceso Denegado',
                2022=>'Conexion rechazada',
                default=>'Error desconocido',
               };
            }
            return self::$connection;
        }
    }
?>