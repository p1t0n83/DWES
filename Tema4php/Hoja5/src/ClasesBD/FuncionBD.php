<?php
namespace App\ClasesBD;
// como conexion esta en la misma carpeta se puede quitar
use PDOException;
use PDO;
use App\Clases\Urgencia;
use App\Clases\Familia;
use App\Clases\Turno;
class FuncionBD
{
    public static function getMedicos(): array
    {
        try {
            $dwes = ConexionBD::getConnection();
            $stmt = $dwes->query("
            SELECT 
                m.codigo, m.nombre, m.edad, t.id AS turno_id, t.descripcion AS turno_desc,
                f.numPacientes, u.unidad
            FROM medicos m
            JOIN turnos t ON m.turno_id = t.id
            LEFT JOIN familia f ON m.codigo = f.medico_codigo
            LEFT JOIN urgencias u ON m.codigo = u.medico_codigo
        ");
            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

            $medicos = [];
            foreach ($resultados as $fila) {
                // Crear objeto Turno
                $turno = new Turno($fila->turno_id, $fila->turno_desc);

                // Determinar tipo de médico según las tablas relacionadas
                if ($fila->numPacientes !== null) { 
                    $medico = new Familia(
                        $fila->codigo,
                        $fila->nombre,
                        $fila->edad,
                        $turno,
                        $fila->numPacientes);
                } elseif ($fila->unidad !== null) { 
                    $medico = new Urgencia(
                        $fila->codigo,
                        $fila->nombre,
                        $fila->edad,
                        $turno,
                        $fila->unidad);
                } else {
                    continue;
                }

                $medicos[] = $medico;
            }

            return $medicos;
        } catch (PDOException $e) {
            echo "Error al obtener los medicos: " . $e->getMessage();
            return [];

        }
    }

    public static function getMedicosPorTurno($descripcion): array
    {
        try {
            $dwes = ConexionBD::getConnection();
            $stmt = $dwes->prepare("
            SELECT 
                m.codigo, m.nombre, m.edad, t.id AS turno_id, t.descripcion AS turno_desc,
                f.numPacientes, u.unidad
            FROM medicos m
            JOIN turnos t ON m.turno_id = t.id
            LEFT JOIN familia f ON m.codigo = f.medico_codigo
            LEFT JOIN urgencias u ON m.codigo = u.medico_codigo
            WHERE t.descripcion = :descripcion
        ");
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);  // Asegúrate de usar el tipo correcto
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

            $medicos = [];
            foreach ($resultados as $fila) {
                // Crear objeto Turno
                $turno = new Turno($fila->turno_id, $fila->turno_desc);

                // Determinar tipo de médico según las tablas relacionadas
                if ($fila->numPacientes !== null) { // Médico de familia
                    $medico = new Familia(
                        $fila->codigo,
                        $fila->nombre,
                        $fila->edad,
                        $turno,
                        $fila->numPacientes);
                } elseif ($fila->unidad !== null) { // Médico de urgencia
                    $medico = new Urgencia(
                        $fila->codigo,
                        $fila->nombre,
                        $fila->edad,
                        $turno,
                        $fila->unidad);
                } else {
                    continue;
                }

                $medicos[] = $medico;
            }

            return $medicos;
        } catch (PDOException $e) {
            echo "Error al obtener los médicos: " . $e->getMessage();
            return [];
        }
    }
    public static function getMedicosFamiliaPorNumPacientes($numPacientes): array
    {
        try {
            $dwes = ConexionBD::getConnection();
            $stmt = $dwes->prepare("
            SELECT 
                m.codigo, m.nombre, m.edad, t.id AS turno_id, t.descripcion AS turno_desc,
                f.numPacientes
            FROM medicos m
            JOIN turnos t ON m.turno_id = t.id
            JOIN familia f ON m.codigo = f.medico_codigo
            WHERE f.numPacientes >= :numPacientes
        ");
            $stmt->bindParam(':numPacientes', $numPacientes, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

            $medicos = [];
            foreach ($resultados as $fila) {
                // Crear objeto Turno
                $turno = new Turno($fila->turno_id, $fila->turno_desc);

                // Crear el objeto de médico de familia
                $medico = new Familia(
                    $fila->codigo,
                    $fila->nombre,
                    $fila->edad,
                    $turno,
                    $fila->numPacientes);
                $medicos[] = $medico;
            }

            return $medicos;
        } catch (PDOException $e) {
            echo "Error al obtener los médicos de familia: " . $e->getMessage();
            return [];
        }
    }


}
?>