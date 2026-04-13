<?php require_once __DIR__ . '/../template/header.php'; ?>

<div class="mx-auto p-4" style="max-width: 900px;">
    <div class="card">
        <div class="card-header">
            <strong>CAPTURAR LA INFORMACIÓN DEL TORNEO</strong>
        </div>

        <div class="card-body">
            <form action="torneos_insert.php" method="POST">
                <div class="mb-3">
                    <label for="nombre_torneo" class="form-label">Nombre del torneo</label>
                    <input type="text" class="form-control" id="nombre_torneo" name="txtNombreTorneo" required>
                </div>

                <div class="mb-3">
                    <label for="organizador" class="form-label">Organizador</label>
                    <input type="text" class="form-control" id="organizador" name="txtOrganizador" required>
                </div>

                <div class="mb-3">
                    <label for="patrocinadores" class="form-label">Patrocinadores</label>
                    <textarea class="form-control" id="patrocinadores" name="txtPatrocinadores" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="sede" class="form-label">Sede</label>
                        <input type="text" class="form-control" id="sede" name="txtSede" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input class="form-control" list="listaCategorias" id="categoria" name="txtCategoria" required>
                        <datalist id="listaCategorias">
                            <option value="Primera fuerza">
                            <option value="Segunda fuerza">
                            <option value="Tercera fuerza">
                            <option value="Libre">
                            <option value="Juvenil">
                            <option value="Femenil">
                            <option value="Empresarial">
                            <option value="Infantil">
                            <option value="Minibasket">
                        </datalist>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="premio_1" class="form-label">Primer lugar</label>
                        <input type="text" class="form-control" id="premio_1" name="txtPremio1" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="premio_2" class="form-label">Segundo lugar</label>
                        <input type="text" class="form-control" id="premio_2" name="txtPremio2" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="premio_3" class="form-label">Tercer lugar</label>
                        <input type="text" class="form-control" id="premio_3" name="txtPremio3" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="otro_premio" class="form-label">Otro premio</label>
                        <input type="text" class="form-control" id="otro_premio" name="txtOtroPremio">
                    </div>
                </div>

                <hr>
                <p><strong>Datos del organizador del torneo</strong></p>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="txtUsuario" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="txtContrasena" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="admin.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>

        <div class="card-footer text-muted">
            Formulario de registro de torneos | José Roberto Corona Ramírez
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../template/footer.php'; ?>