<?php
/**
 * Modelo que representa a la entidad Futbolista.
 * Aquí se concentran las operaciones CRUD.
 * Autor: José Roberto Corona Ramírez
 */

class Futbolista {
    private $conn;
    private $table_name = "futbolistas";

    // Propiedades del futbolista
    public $id;
    public $nombre;
    public $posicion;
    public $numero;
    public $edad;
    public $equipo;

    /**
     * Constructor que recibe la conexión a base de datos.
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Obtener todos los futbolistas.
     */
    public function getAll() {
        $query = "SELECT id, nombre, posicion, numero, edad, equipo, created_at, updated_at 
                  FROM " . $this->table_name . " 
                  ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    /**
     * Obtener un futbolista por ID.
     */
    public function getById() {
        $query = "SELECT id, nombre, posicion, numero, edad, equipo, created_at, updated_at 
                  FROM " . $this->table_name . " 
                  WHERE id = :id 
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }

    /**
     * Crear un nuevo futbolista.
     */
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET nombre = :nombre, posicion = :posicion, numero = :numero, edad = :edad, equipo = :equipo";

        $stmt = $this->conn->prepare($query);

        // Sanitiza datos para mayor seguridad
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->posicion = htmlspecialchars(strip_tags($this->posicion));
        $this->numero = htmlspecialchars(strip_tags($this->numero));
        $this->edad = htmlspecialchars(strip_tags($this->edad));
        $this->equipo = htmlspecialchars(strip_tags($this->equipo));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":posicion", $this->posicion);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":equipo", $this->equipo);

        return $stmt->execute();
    }

    /**
     * Actualizar un futbolista existente.
     */
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET nombre = :nombre, posicion = :posicion, numero = :numero, edad = :edad, equipo = :equipo
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->posicion = htmlspecialchars(strip_tags($this->posicion));
        $this->numero = htmlspecialchars(strip_tags($this->numero));
        $this->edad = htmlspecialchars(strip_tags($this->edad));
        $this->equipo = htmlspecialchars(strip_tags($this->equipo));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":posicion", $this->posicion);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":equipo", $this->equipo);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Eliminar un futbolista por ID.
     */
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
?>