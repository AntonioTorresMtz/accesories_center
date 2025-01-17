<?php
include('../db.php');
session_start();

$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$precio = $_POST["precio"];

$consulta = "INSERT INTO `nombre_tipo_protector` (`nombre`, `clave`, `precio`)
VALUES ('$nombre', '$clave', '$precio');";

$resultado = mysqli_query($conn, $consulta);

if (!$resultado) {
    echo 'Error en la actualacion <br>';
    printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['exito_TipoP'] = "Mica guardada";
    header("Location: ../nuevoTipoProtector.php");
    exit();
}

?>