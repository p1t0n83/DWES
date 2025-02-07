<?php

declare(strict_types=1);

namespace APP\Entities;

use App\Services\DBConnection;
use PDO;

final class Producto
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->getConexion();
        $this->createTable();
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



    public function get(): array
    {
        $sql = 'SELECT nombre,descripcion,precio FROM productos';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function find(int $id): bool
    {
        $sql = 'SELECT COUNT(nombre) FROM productos WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return (bool) $stmt->fetchColumn();
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_merge($data, ['id' => $id]));
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM productos WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
