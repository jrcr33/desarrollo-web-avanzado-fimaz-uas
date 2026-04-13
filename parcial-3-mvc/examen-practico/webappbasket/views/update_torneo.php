<?php
require_once __DIR__ . '/../../controllers/TorneosController.php';
require_once __DIR__ . '/../template/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$objController = new TorneosController();
$torneo = $objController->readOneTorneo($id);

if (!$torneo) {
    header("Location: read_all_torneos.php");
    exit;
}
?>

<div class="mx-auto p-4" style="max-width: 900px;">
    <div class="card">
        <div class="card-header">
            <strong>EDITAR INFORMACIÓN DEL TORNEO</strong>
        </div>

        <div class="card-body">
            <form action="torneo_update.php" method="POST">
                <div class="mb-3">
                    <label for="id" class="form-label">ID del torneo</label>
                    <input type="text" class="form-control" id="id" name="txtId" value="<?php echo $torneo['id']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nombre_torneo" class="form-label">Nombre del torneo</label>
                    <input type="text" class="form-control" id="nombre_torneo" name="txtNombreTorneo" value="<?php echo htmlspecialchars($torneo['nombre_torneo']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="organizador" class="form-label">Organizador</label>
                    <input type="text" class="form-control" id="organizador" name="txtOrganizador" value="<?php echo htmlspecialchars($torneo['organizador']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="patrocinadores" class="form-label">Patrocinadores</label>
                    <textarea class="form-control" id="patrocinadores" name="txtPatrocinadores" rows="3"><?php echo htmlspecialchars($torneo['patrocinadores']); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="sede" class="form-label">Sede</label>
                        <input type="text" class="form-control" id="sede" name="txtSede" value="<?php echo htmlspecialchars($torneo['sede']); ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="categoria" name="txtCategoria" value="<?php echo htmlspecialchars($torneo['categoria']); ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="premio_1" class="form-label">Primer lugar</label>
                        <input type="text" class="form-control" id="premio_1" name="txtPremio1" value="<?php echo htmlspecialchars($torneo['premio_1']); ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="premio_2" class="form-label">Segundo lugar</label>
                        <input type="text" class="form-control" id="premio_2" name="txtPremio2" value="<?php echo htmlspecialchars($torneo['premio_2']); ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="premio_3" class="form-label">Tercer lugar</label>
                        <input type="text" class="form-control" id="premio_3" name="txtPremio3" value="<?php echo htmlspecialchars($torneo['premio_3']); ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="otro_premio" class="form-label">Otro premio</label>
                        <input type="text" class="form-control" id="otro_premio" name="txtOtroPremio" value="<?php echo htmlspecialchars($torneo['otro_premio']); ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="read_all_torneos.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../template/footer.php'; ?>