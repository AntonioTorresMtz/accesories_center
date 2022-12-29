<?php
include('../db.php');
session_start();

$descripcion = $_POST["descripcion"];

$consulta = "INSERT INTO `faltantes` (`id_faltante`, `descripcion`) VALUES (NULL, '$descripcion')";
$resultado = mysqli_query($conn, $consulta);
    
if(!$resultado){
    echo 'Error en la actualacion <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $_SESSION['exito_Faltante'] = "Mica guardada";
    header("Location: ../faltantes.php");
    exit(); 
}



?>