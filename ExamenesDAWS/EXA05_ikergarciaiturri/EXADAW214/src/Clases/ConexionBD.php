<?php
namespace Examen05\Clases;
use Dotenv\Dotenv;
use PDO;
use PDOException;
//clase que conecta a la base de datos
class ConexionBD{
    private static $conexion=null;

    public static function getConexion(){
          if(self::$conexion===null){
        $dotenv=Dotenv::createImmutable(dirname(__DIR__,2));
        $dotenv->load();
        $dsn=$_ENV['DB_DSN'] ?? '';
        $username=$_ENV['DB_USERNAME']?? '';
        $password=$_ENV['DB_PASSWORD'] ?? '';

        try{
            self::$conexion=new PDO($dsn,$username,$password);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error de conexion: ". $e->getMessage();
        }
    }
      return self::$conexion;
    }
}
?>