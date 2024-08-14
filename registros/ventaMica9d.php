<?php
include('../db.php');
session_start();

// Sanitizar y validar entradas
$marca = filter_var(trim($_POST['marca']), FILTER_SANITIZE_STRING);
$modelo = filter_var(trim($_POST['modelo']), FILTER_SANITIZE_STRING);
$cantidad = filter_var(trim($_POST['cantidad']), FILTER_VALIDATE_INT);
$precio = filter_var(trim($_POST['precio']), FILTER_VALIDATE_FLOAT);

if(isset($_POST["descuento"]) && is_numeric(trim($_POST["descuento"]))) {
    $descuento = (float)trim($_POST["descuento"]); // Convertir a decimal
} else {
    $descuento = 0; // Valor por defecto si no está definido o no es numérico
}

// Patrón para extraer id_modelo y nombre_modelo
$patron = "/^([0-9]+)-([a-zA-Z0-9'.\s]{1,30})$/";

$encontrado = preg_match($patron, $modelo, $coincidencias);
$id_modelo = 0;
$nombre_modelo = '';

if ($encontrado) {
    $id_modelo = $coincidencias[1];
    $nombre_modelo = $coincidencias[2];

    echo "ID: " . $id_modelo . "<br>";
    echo "Modelo: " . $nombre_modelo . "<br>";
    echo "Encontrado:<br>";

    // Usar declaraciones preparadas para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO `ventas` (`id_venta`, `id_producto`, `marca`, `fecha`, `id_tipo`, `cantidad`, `precio`, `descuento`, `nombre_modelo`) VALUES (NULL, '2', ?, current_timestamp(), NULL, ?, ?, ?, ?)");
    $stmt->bind_param("sidds", $marca, $cantidad, $precio, $descuento, $nombre_modelo);

    if ($stmt->execute()) {
        echo 'Exito mica <br>';
        
        $stmt2 = $conn->prepare("UPDATE `micas9d` SET `cantidad` = cantidad - ? WHERE `micas9d`.`id_mica9d` = ?");
        $stmt2->bind_param("ii", $cantidad, $id_modelo);
        
        if ($stmt2->execute()) {
            $_SESSION['exito_ventaMica9h'] = "Mica guardada";
            header("Location: ../ventaMenu_mica9d.php");
            exit();
        } else {
            echo 'Error actualizar cantidad <br>';
            printf("Errormessage: %s\n", $conn->error);
        }

        $stmt2->close();
    } else {
        echo 'Error mica <br>';
        printf("Errormessage: %s\n", $conn->error);
    }

    $stmt->close();
} else {
    print "<p>No se han encontrado coincidencias.</p>\n";
    $_SESSION['exito_ventaMica9d'] = "Mica guardada";
    header("Location: ../ventaMenu_mica9d.php");
    exit();
}

echo $modelo;
?>
