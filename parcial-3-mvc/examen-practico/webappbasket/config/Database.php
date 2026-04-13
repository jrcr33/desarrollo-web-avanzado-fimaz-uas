<?php
/**
 * Proyecto MVC de torneos de basket
 * Alumno: José Roberto Corona Ramírez
 * Archivo: Database.php
 * Función: Crear la conexión a MySQL usando PDO
 */

class Database {
    // Datos de conexión
    private string $host = "localhost";
    private string $db = "proyecto";
    private string $user = "root";
    private string $password = "";

    /**
     * Método que crea y devuelve la conexión PDO
     */
    public function connect(): PDO {
        try {
            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8",
                $this->user,
                $this->password
            );

            // Configura PDO para mostrar errores como excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>