<?php

// Clase que se encarga de la conexión a la base de datos
class Database {

    // Atributos privados con los datos de conexión
    private $host = "localhost";        // Servidor de la base de datos
    private $dbname = "phppdobd";       // Nombre de la base de datos
    private $username = "root";         // Usuario de MySQL
    private $password = "";             // Contraseña (vacía en XAMPP)
    private $connection;                // Variable donde se guardará la conexión

    // Constructor: se ejecuta automáticamente al crear el objeto
    public function __construct() {

        try {
            // Cadena DSN para conexión con MySQL usando PDO
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

            // Se crea la conexión usando PDO
            $this->connection = new PDO($dsn, $this->username, $this->password);

            // Configuración: mostrar errores como excepciones
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Configuración: devolver resultados como arreglo asociativo
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Si hay error, se muestra el mensaje
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método para obtener la conexión
    public function getConnection() {
        return $this->connection;
    }
}
?>