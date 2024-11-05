<?php
session_start();
include '../db.php';

$id_garantia = $_POST['id_garantia'];
$id_venta = $_POST['id_venta'];
$solucion = $_POST['solucion'];
$monto_rembolso = isset($_POST["rembolso"]) ? $_POST["rembolso"] : null;
$observaciones = $_POST['observaciones'];
$imei = isset($_POST["imei"]) ? $_POST["imei"] : null;
$diferencia = isset($_POST["diferencia"]) ? $_POST["diferencia"] : null;
$monto_diferencia = isset($_POST["monto_diferencia"]) ? $_POST["monto_diferencia"] : null;
$cantidad_efectivo = $diferencia == 1 ? $monto_diferencia : null;
$cantidad_efectivo = isset($_POST["cantidad_efectivo"]) ? $_POST["cantidad_efectivo"] : null;
$especie = isset($_POST["especie"]) ? $_POST["especie"] : null;


if ($solucion != 2) {
    $sp = "SP_INSERTAR_SOLUCION";
    $stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?)");
    if ($stmt) {
        // Asignamos los valores a los parámetros usando bind_param
        mysqli_stmt_bind_param(
            $stmt,
            "idsi",
            $solucion,
            $monto_rembolso,
            $observaciones,
            $id_garantia
        );
        // Ejecutamos la consulta
        if (mysqli_stmt_execute($stmt)) {
            $resultado = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $_SESSION['exito'] = "5";
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
} else {
    $sp = "SP_INSERTAR_SOLUCION_CAMBIO";
    $stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?, ?,?,?,?,?)");
    if ($stmt) {
        // Asignamos los valores a los parámetros usando bind_param
        mysqli_stmt_bind_param(
            $stmt,
            "isiddsisi",
            $id_venta,
            $imei,
            $diferencia,
            $monto_diferencia,
            $cantidad_efectivo,
            $especie,
            $solucion,
            $observaciones,
            $id_garantia
        );
        // Ejecutamos la consulta
        if (mysqli_stmt_execute($stmt)) {
            $resultado = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $_SESSION['exito'] = "5";
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
}




mysqli_close($conn);
