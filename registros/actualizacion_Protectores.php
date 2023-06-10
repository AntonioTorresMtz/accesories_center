<?php
include('../db.php');
session_start();

$marca = $_POST["marca"];
$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];
$tipo = $_POST["tipo"];

//Establecemos una expresion regular para poder separar el id del protector y el tipo de protector

$patron = "/^([0-9]+)(-)([0-9]+)$/";

$encontrado = preg_match($patron, $modelo, $coincidencias, PREG_OFFSET_CAPTURE);
;
$id_protector = 0;
if ($encontrado) {
    $id_protector = $coincidencias[1][0];
    $sp = "SP_UPDATE_PROTECTOR_CANTIDAD";
    $resultado = mysqli_query($conn, "CALL $sp ('$cantidad', '$tipo', '$id_protector', @nuevo)");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        //$_SESSION['exito_NuevoTipo'] = "Mica guardada";
        //header("Location: ../actualizarProtector.php");
        //exit();
        $resultado = $conn->query("SELECT @nuevo")->fetch_assoc()["@nuevo"];
        if ($resultado == 1) {
            mysqli_close($conn);
            $_SESSION['exito_NuevoTipo'] = "Mica guardada";
            header("Location: ../actualizarProtector.php");
            exit();
        } else {
            mysqli_close($conn);
            $_SESSION['exito_actual_Protector'] = "Mica guardada";
            header("Location: ../actualizarProtector.php");
            exit();
        }
    }
}
mysqli_close($conn);



?>