<?php
include('../db.php');
session_start();

$notas = $_POST["notas"];
$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];

$sp = "SP_UPDATE_MICAS_CAMARA";
$resultado = mysqli_query($conn, "CALL $sp ('$notas', '$posicion', '$cantidad', '$id')");

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