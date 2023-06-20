<?php
include('../db.php');
session_start();

$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$ancho = $_POST["ancho"];
$largo = $_POST["largo"];
$camara = $_POST["camara"];
$boton = $_POST["boton"];
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];
$notas = $_POST["notas"];

$query = "UPDATE `micas9h` SET cantidad = '$cantidad', `notas` = '$notas', `ancho` = '$ancho', `largo` = '$largo',
 `camara` = '$camara', `posicion` = '$posicion', `boton` = '$boton' WHERE `micas9h`.`id_mica9h` = '$id'";

$resultado = mysqli_query($conn, $query);

if (!$resultado) {
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['edG_m9h'] = "Mica guardada";
    header("Location: ../index.php");
    exit();
}


mysqli_close($conn);
?>