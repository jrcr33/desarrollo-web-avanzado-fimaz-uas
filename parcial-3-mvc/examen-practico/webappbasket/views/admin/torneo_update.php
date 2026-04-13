<?php
require_once '../../controllers/TorneosController.php';

$obj = new TorneosController();

$obj->updateTorneo(
    $_POST['id'],
    $_POST['nombre'],
    $_POST['organizador'],
    $_POST['patrocinadores'],
    $_POST['sede'],
    $_POST['categoria'],
    $_POST['p1'],
    $_POST['p2'],
    $_POST['p3'],
    $_POST['otro']
);
?>