<?php
/*
-------------------------------------------------------
Alumno: José Roberto Corona Ramírez
Materia: Desarrollo Web Avanzado
Actividad: U2 ATC 2
Archivo: AlumnoDAO.php
Descripción: Clase encargada de las operaciones de
base de datos relacionadas con alumnos y transacciones.
-------------------------------------------------------
*/

// Se incluye la clase Alumno para poder trabajar con objetos de ese tipo
require_once __DIR__ . "/Alumno.php";

// Clase DAO: se encarga de acceder y manipular la base de datos
class AlumnoDAO {

    // Variable que guarda la conexión PDO
    private $pdo;

    // Constructor que recibe la conexión y la guarda en la clase
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para registrar un alumno y su log usando transacciones
    public function registrarAlumnoConLog(Alumno $alumno, $simularError = false) {
        try {
            // Inicia la transacción: desde aquí todo se guarda junto o no se guarda nada
            $this->pdo->beginTransaction();

            // Consulta SQL para insertar un alumno en la tabla alumnos
            $sqlAlumno = "INSERT INTO alumnos (nombre, apellido, correo)
                          VALUES (:nombre, :apellido, :correo)";

            // Prepara la consulta para evitar inyecciones SQL
            $stmtAlumno = $this->pdo->prepare($sqlAlumno);

            // Ejecuta la consulta insertando los datos del objeto Alumno
            $stmtAlumno->execute([
                ":nombre" => $alumno->getNombre(),
                ":apellido" => $alumno->getApellido(),
                ":correo" => $alumno->getCorreo()
            ]);

            // Obtiene el ID del alumno recién insertado
            $idAlumno = $this->pdo->lastInsertId();

            // Si el usuario activó la simulación de error, se lanza una excepción
            if ($simularError) {
                throw new Exception("Error simulado para forzar rollback.");
            }

            // Consulta SQL para registrar la acción en la tabla de logs
            $sqlLog = "INSERT INTO logs_alumnos (idAlumno, accion)
                       VALUES (:idAlumno, :accion)";

            // Prepara la consulta del log
            $stmtLog = $this->pdo->prepare($sqlLog);

            // Ejecuta la inserción del log con el ID del alumno
            $stmtLog->execute([
                ":idAlumno" => $idAlumno,
                ":accion" => "ALTA_ALUMNO - José Roberto Corona Ramírez"
            ]);

            // Si todo salió bien, confirma la transacción con COMMIT
            $this->pdo->commit();

            // Regresa un mensaje de éxito
            return [
                "exito" => true,
                "mensaje" => "✅ Transacción confirmada (COMMIT). Alumno registrado correctamente."
            ];

        } catch (Exception $e) {
            // Si ocurrió un error y la transacción sigue activa, se revierte todo
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }

            // Regresa mensaje de error y detalle de la excepción
            return [
                "exito" => false,
                "mensaje" => "❌ Transacción revertida (ROLLBACK). No se guardaron los datos.",
                "detalle" => $e->getMessage()
            ];
        }
    }

    // Método que obtiene todos los alumnos registrados
    public function obtenerAlumnos() {
        $sql = "SELECT * FROM alumnos ORDER BY idAlumno DESC";
        return $this->pdo->query($sql)->fetchAll();
    }

    // Método que obtiene todos los logs registrados
    public function obtenerLogs() {
        $sql = "SELECT * FROM logs_alumnos ORDER BY idLog DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
}
?>