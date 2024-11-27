<?php
namespace App\ClasesBD;
// como conexion esta en la misma carpeta se puede quitar
use App\ClasesBD\ConexionBD;
use PDOException;
class FuncionBD
{
    //este metodo le pasamos una query y unos parametros
    public static function queryDB(string $query, array $params = []): bool
    {
        //se guardara en una variable si se han modificado filas de las tablas
        $response = false;
        try {
            //creamos la conexion
            $con = ConexionDB::getConnection();
            //preparamos la consulta pasada por parametro
            $stmt = $con->prepare($query);
            //en el caso de que hubiese varios parametros a cambiar, mediante un foreach los tratamos
            if (!empty($params)) {
                foreach ($params as $param => $value) {
                    $stmt->bindParam($param, $value);
                }
            }
            //ejecutamos la consulta
            $stmt->execute();
            //si se han modificado filas se guardara cuantas si es mayor que 0
            $response = $stmt->rowCount() > 0;
        } catch (PDOException $pdo_e) {
            //con un catch tratamos los posibles errores que nos den
            throw new PDOException("SQL::queryDB() " . $pdo_e->getMessage());
        } 
        //return de si ha modificado o no filas
        return $response;
    }
}
?>