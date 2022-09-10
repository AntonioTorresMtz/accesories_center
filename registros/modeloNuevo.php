<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$nombre = $_POST["nombre"];

$consulta = "INSERT INTO `modelos` (`id_modelo`, `nombre`, `marca`) VALUES (NULL, '$nombre', '$marca')";

$resultado = mysqli_query($conn, $consulta);

if(!$resultado){
    echo 'Error en la actualacion <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $_SESSION['exito_modeloNuevo'] = "Mica guardada";
    header("Location: ../nuevoModelo.php");
    exit(); 
}

?>