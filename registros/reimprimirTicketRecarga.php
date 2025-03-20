<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

// Verificamos si se recibieron datos en el cuerpo de la solicitud POST
$data = json_decode(file_get_contents('php://input'), true);

// Verificamos si los datos fueron recibidos correctamente
if ($data) {
    // Extraemos los datos
    $id = $data['idVenta'] ?? null;
    consultarVenta($data['idVenta']);
    $response = [
        'status' => 'success',
        'message' => 'Datos recibidos correctamente',
        'data' => $data['idVenta'],

    ];

    // Configuramos la respuesta con el código HTTP 200 (OK)
    http_response_code(200);
} else {
    // Si no se recibieron datos, enviamos una respuesta de error
    $response = [
        'status' => 'error',
        'message' => 'No se recibieron datos'
    ];

    // Configuramos la respuesta con el código HTTP 400 (Bad Request)
    http_response_code(400);
}

// Enviamos la respuesta de vuelta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);


function consultarVenta($id)
{
    include '../db.php';

    $sql = "SELECT monto, FK_tipo_recarga, telefono, FK_compania, fecha_insercion
    FROM tbl_recargas
    WHERE PK_recarga = '$id'";

    $result = $connRecargas->query($sql);

    if ($result) {
        // Obtener los datos y guardarlos en variables
        $row = $result->fetch_assoc();
        $fecha = $row['fecha_insercion'];
        $monto = $row['monto'];
        $tipo_recarga = $row['FK_tipo_recarga'];
        $telefono = $row['telefono'];
        $compania = $row['FK_compania'];

        imprimirInfo($fecha, $monto, $tipo_recarga, $telefono, $compania);
    }
}

function imprimirInfo($fecha, $monto, $tipo_recarga, $telefono, $compania)
{
    include("../vendor/autoload.php");
    // Crear una instancia del conector de impresión de Windows
    $connector = new WindowsPrintConnector("POS58");

    // Crear una instancia de la impresora
    $printer = new Printer($connector);
    // Realizar las operaciones de impresión
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    //$printer->setFontSize(2, 2);
    $printer->text("Center Accesories\n");
    $printer->text("Hidalgo #151, Ario de Rosales\n");
    $printer->text($fecha . "\n");
    $printer->text("\n");
    //$printer->bitImage($logo);
    $printer->text("\n");
    $printer->text("TICKET DE COMPRA\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Fecha: " . $fecha . " " . $modelo . "\n");
    $printer->text("Concepto: " . $tipo_recarga . "\n");
    $printer->text("Compania: " . $compania . "\n");
    $printer->text("Numero: " . $telefono . "\n");
    $printer->text("Monto: $" . number_format($monto, 2, ".", ",") . "\n");
    $printer->text("\n");
    $printer->text("Agradecemos su compra :)\n");
    $printer->cut();

    // Cerrar la conexión de impresión
    $printer->close();
}



