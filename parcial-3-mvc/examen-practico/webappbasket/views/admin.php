<?php require_once __DIR__ . '/../template/header.php'; ?>

<div class="card mx-auto p-4" style="max-width: 900px;">
    <div class="card-header text-center">
        <strong>MENÚ DEL ADMINISTRADOR</strong>
    </div>

    <div class="card-body">
        <p class="text-center">Bienvenido al panel principal del sistema. Alumno: José Roberto Corona Ramírez</p>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Crear torneo</h5>
                        <p>Registrar un nuevo torneo en el sistema.</p>
                        <a href="frm_torneos.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Listar torneos</h5>
                        <p>Consultar los torneos registrados.</p>
                        <a href="read_all_torneos.php" class="btn btn-success">Ir</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Estadísticas</h5>
                        <p>Opción pendiente de implementar.</p>
                        <button class="btn btn-secondary" disabled>Próximamente</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Anuncios</h5>
                        <p>Opción pendiente de implementar.</p>
                        <button class="btn btn-secondary" disabled>Próximamente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../template/footer.php'; ?>