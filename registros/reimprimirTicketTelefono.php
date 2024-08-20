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

    $sql = "SELECT m.marca, c.modelo, c.imei1, c.imei2, c.estado,
        vc.precio, vc.descuento, (vc.precio - vc.descuento) AS total, vc.fecha_venta
        FROM venta_celular vc 
        INNER JOIN celular c ON vc.FK_celular = c.id_celular
        INNER JOIN marca m ON m.id_marca = c.FK_marca
        WHERE PK_venta = '$id';";

    $result = $conn->query($sql);

    if ($result) {
        // Obtener los datos y guardarlos en variables
        $row = $result->fetch_assoc();
        $fecha = $row['fecha_venta'];
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
        $precio = $row['precio'];
        $descuento = $row['descuento'];
        $total = $row['total'];
        imprimirInfo($marca, $modelo, $imei1, $imei2, $condicion, $precio, $descuento, $total, $fecha);
    }
}

function imprimirInfo($marca, $modelo, $imei1, $imei2, $condicion, $precio, $descuento, $total, $fecha)
{
    include("../vendor/autoload.php");
    // Crear una instancia del conector de impresión de Windows
    $connector = new WindowsPrintConnector("POS58 Printer");

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
    $printer->text("Celular: " . $marca . " " . $modelo . "\n");
    $printer->text("Esatado del telefono: " . $condicion . "\n");
    $printer->text("IMEI 1: " . $imei1 . "\n");
    $printer->text("IMEI 2: " . $imei2 . "\n");
    $printer->text("Precio: $" . number_format($precio, 2, ".", ",") . "\n");
    $printer->text("Descuento: $" . number_format($descuento, 2, ".", ",") . "\n");
    $printer->text("Total: $" . number_format($total, 2, ".", ",") . "\n");

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("El producto adquirido cuenta con un mes de garantia al momento de su compra, en equipos nuevos y una semana en equipos usados.\n");
    $printer->text("Dicha garantía cubre cualquier defecto de fabrica, siempre y cuando el producto
      no presente rayaduras, golpes o se encuentre mojado. Debera ser entregado con todos sus accesorios,
      caja y esta nota de compra.\n");
    $printer->text("\n");
    $printer->text("Agradecemos su compra :)\n");
    $printer->cut();

    // Cerrar la conexión de impresión
    $printer->close();
}



