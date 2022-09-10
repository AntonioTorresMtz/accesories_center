<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];
$tipo = $_POST["tipo"];

//UPDATE `micas9d` SET `cantidad` = '6' WHERE `micas9d`.`id_mica9d` = 2

$patron = "/^([0-9]+)(-)([0-9]+)$/";
//$patron = "/^([0-9]+)(-)([a-zA-Z0-9\'.\s]{1,30})$/";

$encontrado = preg_match($patron, $modelo, $coincidencias, PREG_OFFSET_CAPTURE);;
$id_protector = 0;
if ($encontrado) {
    $id_protector = $coincidencias[1][0] ."<br>";

    $query = "UPDATE tipo_protector SET `cantidad` = cantidad + '$cantidad'
    WHERE id_protector = '$id_protector' and tipo = '$tipo'";

    $resultado = mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) == 0){
        //echo 'No se pudo realizar la consulta <br>';
        //printf("Errormessage: %s\n", $conn->error);
        $nuevoTipo = "INSERT INTO tipo_protector (tipo, cantidad,  id_protector) VALUES ('$tipo', '$cantidad', '$id_protector')";
        $resultado = mysqli_query($conn, $nuevoTipo);
        if(!$resultado){
            echo "Error al crear un nuevo tipo";
        }else{
            $_SESSION['exito_NuevoTipo'] = "Mica guardada";
            header("Location: ../actualizarProtector.php");
            exit(); 
        }
    } else{
        $_SESSION['exito_actual_Protector'] = "Mica guardada";
        header("Location: ../actualizarProtector.php");
        exit(); 
    }

}



?>