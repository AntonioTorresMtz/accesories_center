<?php
session_start();
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

include("../vendor/autoload.php");
include '../db.php';
date_default_timezone_set('America/Mexico_City');

$nombre = $_POST['nombre'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$abono = $_POST['abono'];
$plazo = $_POST['plazo'];



// Liberar memoria del resultado
$sp = "SP_INSERTAR_APARTADO";
$resultado = mysqli_query($conn, "CALL $sp ('$nombre', '$producto', '$precio', '$plazo', '$abono')");

if (!$resultado) {
    echo 'Error consulta al programador ' . $conn->error;
    //printf("Errormessage: %s\n", $conn->error);
} else {
    // Crear una instancia del conector de impresión de Windows
    $connector = new WindowsPrintConnector("POS58");

    // Crear una instancia de la impresora
    $printer = new Printer($connector);
 

    // Realizar las operaciones de impresión
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    //$printer->setFontSize(2, 2);
    $printer->text("Center Accesories\n");
    $printer->text("Hidalgo #151, Ario de Rosales\n");
    $printer->text(date('d-m-Y') . "  " . date('H:i:s') . "\n");
    $printer->text("\n");
    //$printer->bitImage($logo);
    $printer->text("TICKET DE APARTADO\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Cliente: " . $nombre . "\n");
    $printer->text("Producto: " . $producto . "\n");
    $printer->text("Valor total: $" . number_format($precio, 2, ".", ",") . "\n");
    $printer->text("Cantidad abonada: $" . number_format($abono, 2, ".", ",") . "\n");
    $printer->text("Restante: $" . number_format($precio - $abono, 2, ".", ",") . "\n");
    $printer->text("Dia maximo para liquidar");

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("El producto adquirido cuenta con un mes de garantia al momento de su compra.\n");
    $printer->text("\n");
    $printer->text("Gracias por la preferencia :)\n");
    $printer->cut();

    // Cerrar la conexión de impresión
    $printer->close();

    $_SESSION['exito'] = "1";
    header("Location: ../menuApartados.php");
    exit();
}





?>