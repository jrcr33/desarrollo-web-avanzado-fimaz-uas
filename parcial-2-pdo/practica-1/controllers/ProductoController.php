<?php

// Se incluyen las clases necesarias
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Producto.php';

// Clase que maneja las operaciones CRUD de productos
class ProductoController {

    // Variable privada para guardar la conexión a la base de datos
    private $connection;

    // Constructor: crea la conexión cuando se instancia el controlador
    public function __construct() {
        $database = new Database(); // Se crea un objeto de la clase Database
        $this->connection = $database->getConnection(); // Se obtiene la conexión
    }

    // Método para insertar un nuevo producto en la base de datos
    public function crear(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio)
                VALUES (:nombre, :descripcion, :existencia, :precio)";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia', $producto->getExistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getPrecio());

        return $stmt->execute();
    }

    // Método para obtener todos los productos
    public function listar() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Método para buscar un producto por su id
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    // Método para actualizar un producto existente
    public function actualizar(Producto $producto) {
        $sql = "UPDATE productos
                SET nombre = :nombre, descripcion = :descripcion, existencia = :existencia, precio = :precio
                WHERE id = :id";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':id', $producto->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia', $producto->getExistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getPrecio());

        return $stmt->execute();
    }

    // Método para eliminar un producto por su id
    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
?>