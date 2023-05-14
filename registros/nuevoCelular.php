<?php
session_start();
include '../db.php';

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$estado = boolval($_POST['estado']);
$red = $_POST['red'];
$imei1 = $_POST['imei1'];
$precioCompra = $_POST['precioCompra'];
$precioSugerido = $_POST['precioSugerido'];

if (empty($_POST['imei2'])) {
    $imei2 = 0;
} else {
    $imei2 = $_POST['imei2'];
}

if (empty($_POST['almacenamiento'])) {
    $almacenamiento = 0;
} else {
    $almacenamiento = $_POST['almacenamiento'];
}

if (empty($_POST['ram'])) {
    $ram = 0;
} else {
    $ram = $_POST['ram'];
}


$sp = "SP_INSERTAR_TELEFONO";
$resultado = mysqli_query($conn, "CALL $sp ('$marca', '$modelo', '$almacenamiento',
'$ram', '$red', '$imei1', '$imei2', '$estado', '7', '$precioCompra', '$precioSugerido')");

if (!$resultado) {
    echo 'Error consulta al programadooooor <br>';
    printf("Errormessage: %s\n", $conn->error);
} else {
    $_SESSION['exito'] = "1";
    header("Location: ../celulares.php");
    exit();
}
mysqli_close($conn);

?>