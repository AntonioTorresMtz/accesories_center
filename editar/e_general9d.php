<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$ancho = $_POST["ancho"];
$largo = $_POST["largo"];
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];

$query = "UPDATE `micas9d` SET cantidad = '$cantidad', `marca` = '$marca', `ancho` = '$ancho', `largo` = '$largo',
 `posicion` = '$posicion' WHERE `micas9d`.`id_mica9d` = '$id'";

$resultado = mysqli_query($conn, $query);

if(!$resultado){
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $name = "SELECT m.id_modelo FROM modelos m
    INNER JOIN nombre a ON a.nombre_modelo = m.id_modelo
    INNER JOIN micas9d b ON a.id_mica = b.id_mica9d
    WHERE b.id_mica9d = '$id'";
    
    $error = 0;
    $resultado = mysqli_query($conn, $name);

    while($row = mysqli_fetch_assoc($resultado)) {
       $id_modelo = $row["id_modelo"];
        echo $id_modelo;
        $query = "UPDATE `modelos` SET `marca` = '$marca' WHERE `modelos`.`id_modelo` = '$id_modelo'";
        $resultado1 = mysqli_query($conn, $query);
        if(!$resultado1){
            echo 'Error cambio de marca <br>';
            printf("Errormessage: %s\n", $conn->error);
            $error = $error + 1;
        }else{
        echo "Actualizacion exitosa ID: " . $id_modelo . "<br>";
        }
    }

  if($error == 0){
        $_SESSION['edG_m9d'] = "Mica guardada";
        header("Location: ../index.php");
        exit();
    }

}


mysqli_close($conn);
?>