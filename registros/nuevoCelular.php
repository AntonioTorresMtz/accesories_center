<?php
session_start();
include '../db.php';

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$estado = $_POST['estado'];
$red = $_POST['red'];
$imei1 = $_POST['imei1'];
$precioCompra = $_POST['precioCompra'];
$precioSugerido = $_POST['precioSugerido'];
$fecha_compra = '';
$garantia = 0;
$altan_com = $_POST['bait_com'];

if (empty($_POST['fecha_compra'])) {
    $fecha_compra = null;
} else {
    $fecha_compra = $_POST['fecha_compra'];
}

if (empty($_POST['garantia'])) {
    $garantia = 0;
} else {
    $garantia = $_POST['garantia'];
}

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

if (empty($_POST['proveedor'])) {
    $proveedor = null;
} else {
    $proveedor = $_POST['proveedor'];
}

echo $estado;

$sp = "SP_INSERTAR_TELEFONO";
$stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$producto = 7;
if ($stmt) {
    // Asignamos los valores a los parámetros usando bind_param
    mysqli_stmt_bind_param(
        $stmt,
        "isiiissiiddsiii",
        $marca,
        $modelo,
        $almacenamiento,
        $ram,
        $red,
        $imei1,
        $imei2,
        $estado,
        $producto,
        $precioCompra,
        $precioSugerido,
        $fecha_compra,
        $garantia,
        $altan_com,
        $proveedor
    );
    // Ejecutamos la consulta
    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['exito'] = "1";
        header("Location: ../celulares.php");
        exit();
    } else {
        //echo "Error ejecutando la consulta: " . mysqli_stmt_error($stmt);
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: ../celulares.php");
        exit();
    }
}

mysqli_close($conn);
