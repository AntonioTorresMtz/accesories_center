<?php
include('../db.php');
session_start();

$nombre = $_POST["nombre"];

$consulta = "INSERT INTO `nombre_tipo_protector` (`id_nombreTipo`, `nombre`) VALUES (NULL, '$nombre');";

$resultado = mysqli_query($conn, $consulta);

if(!$resultado){
    echo 'Error en la actualacion <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $_SESSION['exito_TipoP'] = "Mica guardada";
    header("Location: ../nuevoTipoProtector.php");
    exit(); 
}

?>