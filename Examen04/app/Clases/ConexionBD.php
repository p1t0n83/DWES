<?php
namespace App\Clases;//lo primero el namespace
use PDO;
use PDOException;
//indicamos donde se encuentra la biblioteca para usar el .env
$Dotenv=\Dotenv\Dotenv::createImmutable(dirname(__DIR__,2));
$Dotenv->load();
//creamos la clase
final class ConexionBD{
    //objeto de la conexion
    private static ?PDO $connection=null;
    //constructor
    final public function __contruct(){}
    
    //metodo para obtener la conexion que devuelve una conexion PDO
    final public static function getConnection():?PDO{
        //try catch para los errores y exceptiones
        try{
            if(!self::$connection){
                self::$connection=new PDO(
                    dsn:$_ENV['DB_DSN'],
                    username:$_ENV['DB_USERNAME'],
                    password:$_ENV['DB_PASSWORD']);
                }
        }catch(PDOException $e){
            echo match($e->getCode()){
                1049=>'Base de datos no encontrada',
                1045=>'Acceso denegado',
                2002=>'Conexion rechazada',
                default=>'Error desconocido',};
            } return self::$connection;//devuelve la conexion
        }
    }
?>