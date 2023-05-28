<?php
include('../db.php');
include('../includes/funcionesFusionar.php');
session_start();


$id_mica = $_POST['modelo'];
$id_modelo = $_POST['modelo2'];
$producto = intval($_POST['producto']);

switch ($producto) {
    case 1:
        mica9h($id_mica, $id_modelo);
        break;
    case 2;
        mica9d($id_mica, $id_modelo);
        break;
    case 3:
        mica100d($id_mica, $id_modelo);
        break;
    case 4:
        micaCamara($id_mica, $id_modelo);
        break;
    case 5:
        micaCurva($id_mica, $id_modelo);
        break;
    case 6:
        protector($id_mica, $id_modelo);
        break;
}
?>