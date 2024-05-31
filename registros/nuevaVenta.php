<?php
include ('../db.php');
session_start();

$cliente = $_POST['cliente'];
$iva = $_POST['iva'];

$cantidad = $_POST['cantidad'];
$productos = $_POST['productos'];

$cantidad_json = json_encode($cantidad);
$productos_json = json_encode($productos);

echo "Cantidad JSON: " . $cantidad_json . "<br>";
echo "Productos JSON: " . $productos_json;

$subtotal = 10;
try {
    // Llamar al procedimiento almacenado
    $sp = "SP_CREAR_FACTURA";
    $resultado = mysqli_query($connFacturas, "CALL $sp ('$cliente', '$subtotal', '$iva', '$productos_json', '$cantidad_json' )");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        echo "Error: " . mysqli_error($connFacturas);
    } else {
        $_SESSION['fusion9h'] = "Fusion hecha";
        //        header("Location: ../fusionarMica9h.php");
        echo "Se guardo la venta";
        exit();
    }
    mysqli_close($conn);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

