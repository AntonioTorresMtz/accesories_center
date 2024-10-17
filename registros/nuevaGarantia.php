<?php
session_start();
include '../db.php';

$FK_venta = $_POST['venta_celular'];
$nombre_cliente = $_POST['nombre_cliente'];
$descripcion = $_POST['descripcion_falla'];
$telefono = $_POST['telefono'];
$observaciones = '';
$ticket_compra = $_POST['ticket_compra'];
$caja = $_POST['caja'];
$accesorios = $_POST['accesorios'];
$contrasena = $_POST['contrasena'];
$formateado = $_POST['formateado'];

if (empty($_POST['observaciones'])) {
    $observaciones = null;
} else {
    $observaciones = $_POST['observaciones'];
}

$sp = "SP_INSERTAR_TICKET_GARANTIA";
$stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$producto = 7;
if ($stmt) {
    // Asignamos los valores a los parámetros usando bind_param
    mysqli_stmt_bind_param(
        $stmt,
        "issssiiiii",
        $FK_venta,
        $descripcion,
        $nombre_cliente,
        $telefono,
        $observaciones,
        $ticket_compra,
        $caja,
        $accesorios,
        $contrasena,
        $formateado
    );
    // Ejecutamos la consulta
    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['exito'] = "4";
        header("Location: ../garantias_menu.php");
        exit();
    } else {
        //echo "Error ejecutando la consulta: " . mysqli_stmt_error($stmt);
        $_SESSION['error'] = mysqli_error($conn);
        echo $_SESSION['error'];
        //header("Location: ../garantias_menu.php");
        exit();
    }
}

mysqli_close($conn);
