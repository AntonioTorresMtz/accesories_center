<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$id = $_POST["id"];
//echo $id
$query = "UPDATE `protectores` SET `marca` = '$marca', `posicion` = '$posicion' WHERE `protectores`.`id_protector` = $id";

$resultado = mysqli_query($conn, $query);

if(!$resultado){
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $name = "SELECT m.id_modelo, m.nombre FROM modelos m
    INNER JOIN modelo_funda a ON a.tipo_modelo = m.id_modelo
    INNER JOIN protectores b ON a.id_protector = b.id_protector
    WHERE b.id_protector = '$id'";

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
        $_SESSION['edG_m9h'] = "Mica guardada";
        header("Location: ../index.php");
        exit();
    }

    //Aqui se necesita un while para que cambie la marca de todos x
}


mysqli_close($conn);
?>