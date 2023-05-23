<?php
include('../db.php');
session_start();
$muro = $_POST['muro'];
$letra = $_POST['letra'];
$cantidad = $_POST['cantidad'];

$sp = "SP_CREAR_POSICIONES";
$resultado = mysqli_query($conn, "CALL $sp ('$muro', '$letra', '$cantidad')");
if (!$resultado) {
    echo 'Error consulta al programador <br>';
    //printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['posicion'] = "1";
    header("Location: ../nuevaPosicion.php");
    exit();
}
mysqli_close($conn);


?>