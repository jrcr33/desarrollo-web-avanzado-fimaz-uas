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
            <strong>DETALLE DEL TORNEO</strong>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">ID del torneo</label>
                <input type="text" class="form-control" value="<?php echo $torneo['id']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre del torneo</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['nombre_torneo']); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Organizador</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['organizador']); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Patrocinadores</label>
                <textarea class="form-control" rows="3" readonly><?php echo htmlspecialchars($torneo['patrocinadores']); ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sede</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['sede']); ?>" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['categoria']); ?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Primer lugar</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['premio_1']); ?>" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Segundo lugar</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['premio_2']); ?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tercer lugar</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['premio_3']); ?>" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Otro premio</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['otro_premio']); ?>" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['usuario']); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña en base de datos</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($torneo['contrasena']); ?>" readonly>
            </div>

            <a href="read_all_torneos.php" class="btn btn-success">Regresar</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../template/footer.php'; ?>