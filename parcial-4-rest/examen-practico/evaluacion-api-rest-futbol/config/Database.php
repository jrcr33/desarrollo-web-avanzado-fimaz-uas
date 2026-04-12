<?php
/**
 * Archivo de conexión a la base de datos usando PDO.
 * Autor: José Roberto Corona Ramírez
 */

class Database {
    private $host = "localhost";
    private $db_name = "futbolistas";
    private $username = "root";
    private $password = "";
    public $conn;

    /**
     * Método para obtener la conexión a la base de datos.
     */
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );

            // Configura PDO para mostrar errores en modo excepción
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $exception) {
            // Si ocurre un error, se responde en formato JSON
            echo json_encode([
                "status" => false,
                "message" => "Error de conexión a la base de datos: " . $exception->getMessage()
            ]);
        }

        return $this->conn;
    }
}
?>