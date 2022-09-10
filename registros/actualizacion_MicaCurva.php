<?php
include('../db.php');
session_start();


$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];

$query = "UPDATE `micascurva` SET `cantidad` = cantidad + '$cantidad'
 WHERE `micascurva`.`id_micaCurva` = '$modelo'";

$resultado = mysqli_query($conn, $query);

if(!$resultado){
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $_SESSION['exito_actual_MicaCurva'] = "Mica guardada";
    header("Location: ../actualizarMica_curva.php");
    exit(); 

}

?>