<?php
session_start();
include '../db.php';
$conn = conectar();

// Asignación con casteo estricto y manejo de NULLs
$marca          = (int)$_POST['marca'];
$modelo         = $_POST['modelo'];
$almacenamiento = !empty($_POST['almacenamiento']) ? (int)$_POST['almacenamiento'] : 0;
$ram            = !empty($_POST['ram']) ? (int)$_POST['ram'] : 0;
$red            = (int)$_POST['red'];
$imei1          = $_POST['imei1'];
$imei2          = !empty($_POST['imei2']) ? $_POST['imei2'] : null;
$estado         = (int)$_POST['estado'];
$producto       = 7;
$precioCompra   = (float)$_POST['precioCompra'];
$precioSugerido = (float)$_POST['precioSugerido'];
$fecha_compra   = !empty($_POST['fecha_compra']) ? $_POST['fecha_compra'] : null;
$garantia       = !empty($_POST['garantia']) ? (int)$_POST['garantia'] : 0;
$altan_com      = (int)$_POST['bait_com'];
$proveedor      = !empty($_POST['proveedor']) ? (int)$_POST['proveedor'] : null;

$sql = "CALL SP_INSERTAR_TELEFONO(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
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

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        $_SESSION['exito'] = "1";
        header("Location: ../celulares.php");
        exit();
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: ../celulares.php");
        exit();
    }
} else {
    die("Error en la preparación de la consulta: " . mysqli_error($conn));
}

mysqli_close($conn);
