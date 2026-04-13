<?php
/**
 * Proyecto MVC de torneos de basket
 * Alumno: José Roberto Corona Ramírez
 * Archivo: TorneosController.php
 * Función: Recibir acciones desde las vistas y comunicarse con el modelo
 */

require_once __DIR__ . '/../models/TorneosModel.php';

class TorneosController {
    private TorneosModel $model;

    public function __construct() {
        $this->model = new TorneosModel();
    }

    public function saveTorneo(
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
    ): void {
        $id = $this->model->insert(
            $nombre_torneo,
            $organizador,
            $patrocinadores,
            $sede,
            $categoria,
            $premio_1,
            $premio_2,
            $premio_3,
            $otro_premio,
            $usuario,
            $contrasena
        );

        if ($id !== false) {
            header("Location: admin.php");
        } else {
            header("Location: frm_torneos.php");
        }
        exit;
    }

    public function readTorneos(): array|false {
        return $this->model->read();
    }

    public function readOneTorneo(int $id): array|false {
        $torneo = $this->model->readOne($id);

        if ($torneo !== false) {
            return $torneo;
        }

        return false;
    }

    public function updateTorneo(
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
    ): void {
        $result = $this->model->update(
            $id,
            $nombre_torneo,
            $organizador,
            $patrocinadores,
            $sede,
            $categoria,
            $premio_1,
            $premio_2,
            $premio_3,
            $otro_premio
        );

        if ($result !== false) {
            header("Location: read_one_torneo.php?id=" . $id);
        } else {
            header("Location: read_all_torneos.php");
        }
        exit;
    }

    public function deleteTorneo(int $id): void {
        $result = $this->model->delete($id);

        if ($result) {
            header("Location: read_all_torneos.php");
        } else {
            header("Location: read_one_torneo.php?id=" . $id);
        }
        exit;
    }
}
?>