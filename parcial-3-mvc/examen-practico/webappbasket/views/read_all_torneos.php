<?php
require_once __DIR__ . '/../../controllers/TorneosController.php';
require_once __DIR__ . '/../template/header.php';

$objController = new TorneosController();
$rows = $objController->readTorneos();
?>

<div class="mx-auto p-4" style="max-width: 1000px;">
    <div class="card">
        <div class="card-header">
            <strong>LISTADO GENERAL DE TORNEOS</strong>
        </div>

        <div class="card-body">
            <a href="admin.php" class="btn btn-primary mb-3">Regresar</a>

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del torneo</th>
                        <th>Organizador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($rows && count($rows) > 0): ?>
                        <?php foreach ($rows as $fila): ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo htmlspecialchars($fila['nombre_torneo']); ?></td>
                                <td><?php echo htmlspecialchars($fila['organizador']); ?></td>
                                <td>
                                    <a href="read_one_torneo.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary btn-sm">Consultar</a>
                                    <a href="update_torneo.php?id=<?php echo $fila['id']; ?>" class="btn btn-success btn-sm">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar<?php echo $fila['id']; ?>">
                                        Eliminar
                                    </button>

                                    <div class="modal fade" id="modalEliminar<?php echo $fila['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Eliminar torneo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Deseas eliminar el torneo <strong><?php echo htmlspecialchars($fila['nombre_torneo']); ?></strong>? Esta acción no se puede deshacer.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="delete_torneo.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay torneos registrados aún.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../template/footer.php'; ?>