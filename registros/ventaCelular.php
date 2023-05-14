<?php
session_start();
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

include("../vendor/autoload.php");
include '../db.php';
date_default_timezone_set('America/Mexico_City');

$imei = $_POST['imei'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$total = $precio - $descuento;
$totalF = number_format($total, 2, ".", ",");
$marca = '';
$modelo = '';
$imei1 = '';
$imei2 = '';
$estado = '';
$id = '';

$sql = "SELECT c.id_celular, m.marca, c.modelo, c.imei1, c.imei2, estado FROM celular c
INNER JOIN marca m ON  m.id_marca = c.FK_marca
WHERE id_celular = '$imei' OR imei1 = '$imei';";

$result = $conn->query($sql);

if ($result) {
    // Obtener los datos y guardarlos en variables
    $row = $result->fetch_assoc();
    $id = $row['id_celular'];
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $imei1 = $row['imei1'];
    $imei2 = $row['imei2'];
    $estado = boolval($row['estado']);
    $condicion = '';
    if ($estado == true) {
        $condicion = 'Nuevo';
    } else {
        $condicion = 'Usado';
    }
    // Liberar memoria del resultado
    $sp = "SP_INSERTAR_VENTA_CELULAR";
    $resultado = mysqli_query($conn, "CALL $sp ('$id', '$precio', '$descuento')");

    if (!$resultado) {
        echo 'Error consulta al programador ' . $conn->error;
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        // Crear una instancia del conector de impresión de Windows
        $connector = new WindowsPrintConnector("POS58 Printer");

        // Crear una instancia de la impresora
        $printer = new Printer($connector);
        $rutaLogo = "../img/logoImpresion.png";
        $logo = EscposImage::load($rutaLogo);


        // Realizar las operaciones de impresión
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        //$printer->setFontSize(2, 2);
        $printer->text("Center Accesories\n");
        $printer->text("Hidalgo #151, Ario de Rosales\n");
        $printer->text(date('d-m-Y') . "  " . date('H:i:s') . "\n");
        $printer->text("\n");
        $printer->bitImage($logo);
        $printer->text("TICKET DE COMPRA\n");
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Celular: " . $marca . " " . $modelo . "\n");
        $printer->text("Esatado del telefono: " . $condicion . "\n");
        $printer->text("IMEI 1: " . $imei1 . "\n");
        $printer->text("IMEI 2: " . $imei2 . "\n");
        $printer->text("Precio: $" . number_format($precio, 2, ".", ",") . "\n");
        $printer->text("Descuento: $" . number_format($descuento, 2, ".", ",") . "\n");
        $printer->text("Total: $" . $totalF . "\n");

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("El producto adquirido cuenta con un mes de garantia al momento de su compra.\n");
        $printer->text("Dicha garantía cubre cualquier defecto de fabrica, siempre y cuando el producto
        no presente rayaduras, golpes o se encuentre mojado. Debera ser entregado con todos sus accesorios,
        caja y esta nota de compra.\n");
        $printer->text("\n");
        $printer->text("Agradecemos su compra :)\n");
        $printer->cut();

        // Cerrar la conexión de impresión
        $printer->close();
        $result->free();

        $_SESSION['exito'] = "2";
        header("Location: ../ventaMenu_celular.php");
        exit();
    }

} else {
    echo "Error en la consulta: " . $conn->error;
}





?>