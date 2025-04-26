<?php
namespace App\clasesbd;

use App\clasesbd\ConexionBD;
use PDOException;
use PDO;
use App\clases\Turno;
use App\clases\Familia;
use App\clases\Urgencia;

class FuncionesBD
{
    function getMedicos() {
        try {
            $conexion = ConexionBD::getConnection();
            $medicos = [];
            $stmt = $conexion->query("
                SELECT 
                    m.idmedico, m.nombre, m.especialidad, m.turno_id, t.nombre AS turno_nombre,
                    f.num_pacientes, u.tiempo_respuesta
                FROM medicos m
                JOIN turnos t ON m.turno_id = t.idturno
                LEFT JOIN familia f ON m.idmedico = f.idfamilia
                LEFT JOIN urgencias u ON m.idmedico = u.idurgencias
            ");
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultado as $row) {
                $turno = new Turno($row['turno_id'], $row['turno_nombre']);
                if (!is_null($row['num_pacientes'])) {
                    $medicos[] = new Familia(
                        $row['idmedico'],
                        $row['nombre'],
                        $row['especialidad'],
                        $turno,
                        $row['num_pacientes']
                    );
                } elseif (!is_null($row['tiempo_respuesta'])) {
                    $medicos[] = new Urgencia(
                        $row['idmedico'],
                        $row['nombre'],
                        $row['especialidad'],
                        $turno,
                        $row['tiempo_respuesta']
                    );
                }
            }
            return $medicos;
        } catch (PDOException $e) {
            echo "Error al obtener los médicos: " . $e->getMessage();
            return [];
        }
    }
}
?>