<?php
include('../db.php');
session_start();

$id_mica = $_POST['modelo'];
$id_modelo = $_POST['modelo2'];
$producto = intval($_POST['producto']);
$cantidad1 = $_POST['cantidad1'];
$cantidad2 = $_POST['cantidad2'];

$sp = "SP_DIVIDIR";
$resultado = mysqli_query($conn, "CALL $sp ('$producto', '$id_mica', '$id_modelo', '$cantidad1', '$cantidad2')");

if (!$resultado) {
    echo 'Error consulta al programador <br>';
    //printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['desfusion'] = "Modelos separados";
    header("Location: ../desfusionarMenu.php");
    exit();
}
mysqli_close($conn);
?>