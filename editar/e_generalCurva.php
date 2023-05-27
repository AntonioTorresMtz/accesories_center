<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];

$sp = "SP_UPDATE_MICAS_CURVA";
$resultado = mysqli_query($conn, "CALL $sp ('$marca', '$posicion', '$cantidad', '$id')");

if (!$resultado) {
    echo 'Error consulta al programador <br>';
    //printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['edG_m9d'] = "Mica guardada";
    header("Location: ../index.php");
    exit();
}
mysqli_close($conn);
?>