<?php
/**
 * Proyecto MVC de torneos de basket
 * Alumno: José Roberto Corona Ramírez
 * Archivo: torneos_insert.php
 * Función: Capturar datos del formulario y enviarlos al controlador
 */

require_once __DIR__ . '/../../controllers/TorneosController.php';

$nombre_torneo   = trim($_POST['txtNombreTorneo'] ?? '');
$organizador     = trim($_POST['txtOrganizador'] ?? '');
$patrocinadores  = trim($_POST['txtPatrocinadores'] ?? '');
$sede            = trim($_POST['txtSede'] ?? '');
$categoria       = trim($_POST['txtCategoria'] ?? '');
$premio_1        = trim($_POST['txtPremio1'] ?? '');
$premio_2        = trim($_POST['txtPremio2'] ?? '');
$premio_3        = trim($_POST['txtPremio3'] ?? '');
$otro_premio     = trim($_POST['txtOtroPremio'] ?? '');
$usuario         = trim($_POST['txtUsuario'] ?? '');
$contrasena      = trim($_POST['txtContrasena'] ?? '');

$objController = new TorneosController();
$objController->saveTorneo(
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
?>