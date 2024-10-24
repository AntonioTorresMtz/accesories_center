<?php
session_start();
include '../db.php';

$id_garantia = $_POST['id_garantia'];
$solucion = $_POST['solucion'];
$monto_rembolso = isset($_POST["rembolso"]) ? $_POST["rembolso"] : null;


$observaciones = $_POST['observaciones'];

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
    echo "Cambio";
}




mysqli_close($conn);
