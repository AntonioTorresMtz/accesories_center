<?php
session_start();
include('../db.php');
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$descuento = $_POST["descuento"];


$sp = "SP_UPDATE_VENTA";
$resultado = mysqli_query($conn, "CALL $sp ('$id', '$cantidad', '$precio', '$descuento')");

if (!$resultado) {
    echo 'Error consulta al programador <br>';
    //printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['actualizacion'] = "exito";
    header("Location: ../vistaVentas.php");
    exit();
}
mysqli_close($conn);
?>