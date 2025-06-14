<?php
include '../db.php';

if (isset($_POST['imei'])) {
    $imei = $_POST['imei'];
    $id_celular = intval($imei); // intenta convertir a entero si aplica    

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta usando parámetros preparados (asumiendo que imei puede coincidir con imei1, imei2 o id_celular)
    $stmt = $conn->prepare("SELECT * FROM celular WHERE imei1 = ? OR imei2 = ? OR id_celular = ?");
    $stmt->bind_param("ssi", $imei, $imei, $id_celular); // "s" para string; si id_celular es numérico, cambia el último a "i"
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo 'existe';
    } else {
        echo 'no_existe';
    }

    $stmt->close();
    $conn->close();
}
?>