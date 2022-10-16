<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$nombre = $_POST["nombre"];

if($marca == 0){
    $_SESSION['error_modeloNuevo'] = "Mica guardada";
    header("Location: ../nuevoModelo.php");
    exit();
} else{
    $query = "SELECT nombre FROM modelos WHERE marca = '$marca' and nombre = '$nombre'";
    $resultado = mysqli_query($conn, $query);
    $totalFilas = mysqli_num_rows($resultado); 

    if($totalFilas == 0){
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
    } else{
        $_SESSION['error_Nombre'] = "El nombre ya existe";
        header("Location: ../nuevoModelo.php");
        exit(); 
    }
}



?>