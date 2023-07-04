<?php
include('../db.php');
session_start();

$tipo = $_POST["tipo"];
$nombre = $_POST["nombre"];

$sp = "SP_UPDATE_NOMBRE_TIPO_PROTECTOR";
$resultado = mysqli_query($conn, "CALL $sp ('$tipo', '$nombre')");

if (!$resultado) {
    echo 'Error consulta al programador <br>';
    printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['exito'] = "Modelo Actualizado";
    header("Location: ../editaModelosMenu.php");
    exit();
}
mysqli_close($conn);
?>