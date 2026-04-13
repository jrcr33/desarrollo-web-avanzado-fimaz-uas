<?php
require_once '../../controllers/TorneosController.php';

$obj = new TorneosController();
$obj->deleteTorneo($_GET['id']);
?>