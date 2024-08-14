<?php
session_start();
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

include ("../vendor/autoload.php");
include '../db.php';
date_default_timezone_set('America/Mexico_City');

$numero = $_POST['numero'];
$monto = $_POST['monto'];
$tipo = intval($_POST['tipo']);
$fecha = $_POST['fecha'];
$concepto = '';

if($tipo == 1){
    $concepto = 'Venta Paquete';
} elseif($tipo == 2){
    $concepto = 'Recarga tiempo aire';
}


// Liberar memoria del resultado
$sp = "SP_INSERTAR_RECARGA";
$resultado = mysqli_query($connRecargas, "CALL $sp ('$monto', '$tipo', '$numero', '$fecha')");

if (!$resultado) {
    echo 'Error consulta al programador ' . $conn->error;
    //printf("Errormessage: %s\n", $conn->error);
} else {
    // Crear una instancia del conector de impresión de Windows
    $connector = new WindowsPrintConnector("POS58 Printer");

    // Crear una instancia de la impresora
    $printer = new Printer($connector);
    // Realizar las operaciones de impresión
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    //$printer->setFontSize(2, 2);
    //Impirmir imagen
    $image = EscposImage::load("../phone.png");
    $printer->graphics($image);
    $printer->text("Center Accesories\n");
    $printer->text("Hidalgo #151, Ario de Rosales\n");
    $printer->text("\n");
    //$printer->bitImage($logo);
    $printer->text("TICKET DE COMPRA\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Concepto: " . $concepto . "\n");
    $printer->text("Monto: " . $monto . "\n");
    $printer->text("Fecha: " . $fecha . "\n");
    $printer->text("Terminal: 460288 ". "\n");
    $printer->text("Estatus: Ok");
    $printer->text("\n");
    $printer->text("\n");
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("Gracias por su compra :)");
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");

 }
    // Cerrar la conexión de impresión
    $printer->close();

    $_SESSION['exito'] = "3";
    header("Location: ../recargasMenu.php");
    exit();


