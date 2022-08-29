<?php
include('../db.php');
session_start();


$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];

$query = "UPDATE `micas9h` SET `cantidad` = cantidad + '$cantidad'
 WHERE `micas9h`.`id_mica9h` = '$modelo'";

$resultado = mysqli_query($conn, $query);

if(!$resultado){
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $_SESSION['exito_actual_Mica9h'] = "Mica guardada";
    header("Location: ../actualizarMica9H.php");
    exit(); 

}

?>