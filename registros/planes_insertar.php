<?php
session_start();
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

include("../vendor/autoload.php");
include '../db.php';
date_default_timezone_set('America/El_Salvador');

$folio = $_POST['folio'];
$cliente = $_POST['cliente'];
$telefono = $_POST['telefono'];
$monto = $_POST['monto'];

// Liberar memoria del resultado
$sp = "SP_INSERTAR_PLAN_TELCEL";
$resultado = mysqli_query($conn, "CALL $sp ('$folio', '$cliente', '$telefono', '$monto')");

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
    //$printer->bitImage($logo);
    $printer->text("TICKET DE COMPRA\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Folio: " . $folio . "\n");
    $printer->text("Cliente: " . $cliente . "\n");
    $printer->text("Telefono: " . $telefono . "\n");
    $printer->text("Monto: " . $monto . "\n");

    $printer->setJustification(Printer::JUSTIFY_CENTER);    
    $printer->text("\n");
    $printer->text("Gracias por su compra :)\n");
    $printer->cut();

    // Cerrar la conexión de impresión
    $printer->close();
    $result->free();

    $_SESSION['exito_plan'] = "1";
    header("Location: ../planes_menu.php");
    exit();
}







?>