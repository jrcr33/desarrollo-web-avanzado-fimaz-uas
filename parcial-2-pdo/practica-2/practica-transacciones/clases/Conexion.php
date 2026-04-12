<?php
/*
-------------------------------------------------------
Alumno: José Roberto Corona Ramírez
Materia: Desarrollo Web Avanzado
Actividad: U2 ATC 2
Archivo: Conexion.php
Descripción: Clase encargada de realizar la conexión
a la base de datos MySQL mediante PDO.
-------------------------------------------------------
*/

// Clase que se encarga de abrir la conexión con la base de datos
class Conexion {

    // Variables privadas con los datos de conexión
    private $host = "localhost";
    private $db = "escuela";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8mb4";
    private $pdo;

    // Método que crea y devuelve la conexión PDO
    public function conectar() {
        try {
            // Se construye la cadena de conexión DSN
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";

            // Se crea el objeto PDO con configuración para manejar errores y resultados
            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activa excepciones si ocurre un error
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Devuelve resultados como arreglo asociativo
            ]);

            // Regresa la conexión ya establecida
            return $this->pdo;

        } catch (PDOException $e) {
            // Si falla la conexión, muestra el error y detiene la ejecución
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>