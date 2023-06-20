<?php
include('../db.php');
session_start();

$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$ancho = $_POST["ancho"];
$largo = $_POST["largo"];
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];
$notas = $_POST["notas"];

$query = "UPDATE `micas9d` SET cantidad = '$cantidad', `notas` = '$notas', `ancho` = '$ancho', `largo` = '$largo',
 `posicion` = '$posicion' WHERE `micas9d`.`id_mica9d` = '$id'";

$resultado = mysqli_query($conn, $query);

if (!$resultado) {
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['edG_m9d'] = "Mica guardada";
    header("Location: ../index.php");
    exit();
}


mysqli_close($conn);
?>