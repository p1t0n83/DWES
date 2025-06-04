<?php

declare(strict_types = 1);

namespace APP\Entities;

use App\Services\DBConnection;
use PDO;
use PDOException;

final class Producto
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBConnection::getConexion();
        $this-> createTable();
    }

    private function createTable(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS productos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            descripcion VARCHAR(255) NOT NULL,
            precio DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )';

        $this->db->exec(statement: $sql);
    }

    /**
     * @param array<string, mixed> $data
     * @return false|string
     */
    public function create(array $data): false|string
    {
        $sql = '
            INSERT INTO productos (nombre, descripcion, precio)
            VALUES (:nombre, :descripcion, :precio)
        ';

        $stmt = $this->db->prepare(query: $sql);
        $stmt->execute(params: $data);

        return $this->db->lastInsertId();
    }

    public function find(int $id):array|null{
        try{
        $stmt=$this->db->prepare('SELECT id,nombre,descripcion,precio,created_at FROM productos WHERE id=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $resultado=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
        }catch(PDOException $error){
            return null;
        }
    }

    public function get():array|null{
        try{
        $stmt=$this->db->query('SELECT id,nombre,descripcion,precio,created_at FROM productos');
        $stmt->execute();
        $resultado=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
        }catch(PDOException $error){
            return null;
        }
    }

    public function update(array $data):bool{
         try{
        $stmt=$this->db->prepare('UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id');
        $stmt->execute(params: $data);
        return $stmt->execute();
        
        }catch(PDOException $error){
            return false;
        }
    }

     public function delete(int $id):bool{
        try{
        $stmt=$this->db->prepare('DELETE  FROM productos WHERE id=:id');
        $stmt->bindParam(":id",$id);
        return  $stmt->execute();
        }catch(PDOException $error){
            return false;
        }
    }
}