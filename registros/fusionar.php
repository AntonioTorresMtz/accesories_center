<?php
include('../db.php');
session_start();


$id_mica = $_POST['modelo'];
$id_modelo = $_POST['modelo2'];

$sp = "SP_FUSIONAR";

$resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo')");

if(!$resultado){
    echo 'Error consulta <br>';
    //printf("Errormessage: %s\n", $conn->error);
} else{
  //  $_SESSION['exito_actual_Mica9d'] = "Mica guardada";
   // header("Location: ../actualizarMica9d.php");
    //exit(); 
    echo 'Exito en la SP <br>';
}

mysqli_close($conn);
?>