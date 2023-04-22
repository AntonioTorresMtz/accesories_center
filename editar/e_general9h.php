<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$ancho = $_POST["ancho"];
$largo = $_POST["largo"];
$camara = $_POST["camara"];
$boton = $_POST["boton"];
$id = $_POST["id"];
$cantidad = $_POST["cantidad"];

$query = "UPDATE `micas9h` SET cantidad = '$cantidad', `marca` = '$marca', `ancho` = '$ancho', `largo` = '$largo',
 `camara` = '$camara', `posicion` = '$posicion', `boton` = '$boton' WHERE `micas9h`.`id_mica9h` = '$id'";

$resultado = mysqli_query($conn, $query);

if(!$resultado){
    echo 'Error mica <br>';
    printf("Errormessage: %s\n", $conn->error);
} else{
    $name = "SELECT m.id_modelo FROM modelos m
    INNER JOIN nombre_mica9h a ON a.nombre_modelo = m.id_modelo
    INNER JOIN micas9h b ON a.id_mica9h = b.id_mica9h
    WHERE b.id_mica9h = '$id'";
    
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

}


mysqli_close($conn);
?>