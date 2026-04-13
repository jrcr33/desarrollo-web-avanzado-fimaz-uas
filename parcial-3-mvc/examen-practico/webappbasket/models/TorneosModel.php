<?php
/**
 * Proyecto MVC de torneos de basket
 * Alumno: José Roberto Corona Ramírez
 * Archivo: TorneosModel.php
 * Función: Contener la lógica de acceso a la base de datos
 */

require_once __DIR__ . '/../config/Database.php';

class TorneosModel {
    private PDO $pdo;

    public function __construct() {
        $connection = new Database();
        $this->pdo = $connection->connect();
    }

    /**
     * Encripta la contraseña antes de guardarla
     */
    public function passwordEncrypt(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Inserta un nuevo torneo
     */
    public function insert(
        string $nombre_torneo,
        string $organizador,
        string $patrocinadores,
        string $sede,
        string $categoria,
        string $premio_1,
        string $premio_2,
        string $premio_3,
        string $otro_premio,
        string $usuario,
        string $contrasena
    ): int|false {
        $contrasenaEncriptada = $this->passwordEncrypt($contrasena);

        $sql = "INSERT INTO torneos (
                    nombre_torneo,
                    organizador,
                    patrocinadores,
                    sede,
                    categoria,
                    premio_1,
                    premio_2,
                    premio_3,
                    otro_premio,
                    usuario,
                    contrasena
                ) VALUES (
                    :nombre_torneo,
                    :organizador,
                    :patrocinadores,
                    :sede,
                    :categoria,
                    :premio_1,
                    :premio_2,
                    :premio_3,
                    :otro_premio,
                    :usuario,
                    :contrasena
                )";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':nombre_torneo', $nombre_torneo);
        $statement->bindParam(':organizador', $organizador);
        $statement->bindParam(':patrocinadores', $patrocinadores);
        $statement->bindParam(':sede', $sede);
        $statement->bindParam(':categoria', $categoria);
        $statement->bindParam(':premio_1', $premio_1);
        $statement->bindParam(':premio_2', $premio_2);
        $statement->bindParam(':premio_3', $premio_3);
        $statement->bindParam(':otro_premio', $otro_premio);
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':contrasena', $contrasenaEncriptada);

        return $statement->execute() ? (int)$this->pdo->lastInsertId() : false;
    }

    /**
     * Devuelve todos los torneos
     */
    public function read(): array|false {
        $statement = $this->pdo->prepare("SELECT * FROM torneos ORDER BY id DESC");
        return $statement->execute() ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    /**
     * Devuelve un torneo por su ID
     */
    public function readOne(int $id): array|false {
        $statement = $this->pdo->prepare("SELECT * FROM torneos WHERE id = :id LIMIT 1");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute() ? $statement->fetch(PDO::FETCH_ASSOC) : false;
    }

    /**
     * Actualiza la información del torneo
     * No actualiza usuario ni contraseña
     */
    public function update(
        int $id,
        string $nombre_torneo,
        string $organizador,
        string $patrocinadores,
        string $sede,
        string $categoria,
        string $premio_1,
        string $premio_2,
        string $premio_3,
        string $otro_premio
    ): int|false {
        $sql = "UPDATE torneos SET
                    nombre_torneo = :nombre_torneo,
                    organizador = :organizador,
                    patrocinadores = :patrocinadores,
                    sede = :sede,
                    categoria = :categoria,
                    premio_1 = :premio_1,
                    premio_2 = :premio_2,
                    premio_3 = :premio_3,
                    otro_premio = :otro_premio
                WHERE id = :id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':nombre_torneo', $nombre_torneo);
        $statement->bindParam(':organizador', $organizador);
        $statement->bindParam(':patrocinadores', $patrocinadores);
        $statement->bindParam(':sede', $sede);
        $statement->bindParam(':categoria', $categoria);
        $statement->bindParam(':premio_1', $premio_1);
        $statement->bindParam(':premio_2', $premio_2);
        $statement->bindParam(':premio_3', $premio_3);
        $statement->bindParam(':otro_premio', $otro_premio);

        return $statement->execute() ? $id : false;
    }

    /**
     * Elimina un torneo por su ID
     */
    public function delete(int $id): bool {
        $statement = $this->pdo->prepare("DELETE FROM torneos WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }
}
?>