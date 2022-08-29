<?php
include('../db.php');
session_start();


$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];

//UPDATE `micas9d` SET `cantidad` = '6' WHERE `micas9d`.`id_mica9d` = 2

$query = "UPDATE `micas9d` SET `cantidad` = cantidad + '$cantidad'
 WHERE `micas9d`.`id_mica9d` = '$modelo'";

$resultado = mysqli_query($conn, $query);

if(!$resultado){
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $_SESSION['exito_actual_Mica9d'] = "Mica guardada";
    header("Location: ../actualizarMica9d.php");
    exit(); 
}

?>