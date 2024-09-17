<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

consultarVenta(7);
function consultarVenta($id)
{
    include '../db.php';

    $sql = "SELECT m.marca, c.modelo, c.imei1, c.imei2, c.estado, vc.precio, vc.descuento, (vc.precio - vc.descuento) AS total 
        FROM venta_celular vc 
        INNER JOIN celular c ON vc.FK_celular = c.id_celular
        INNER JOIN marca m ON m.id_marca = c.FK_marca
        WHERE PK_venta = '$id';";

    $result = $conn->query($sql);

    if ($result) {
        // Obtener los datos y guardarlos en variables
        echo "Se realizo la consulta";
        $row = $result->fetch_assoc();
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
        imprimirInfo($marca, $modelo, $imei1, $imei2, $estado, $precio, $descuento, $total);
    } else {
        echo "Ocurrio un error";
    }
}

function imprimirInfo($marca, $modelo, $imei1, $imei2, $estado, $precio, $descuento, $total)
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
    $printer->text(date('d-m-Y') . "  " . date('H:i:s') . "\n");
    $printer->text("\n");
    //$printer->bitImage($logo);
    $printer->text("\n");
    $printer->text("TICKET DE COMPRA\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Celular: " . $marca . " " . $modelo . "\n");
    echo "Celular: " . $marca . " " . $modelo . "\n";
    $printer->text("Esatado del telefono: " . $estado . "\n");
    $printer->text("IMEI 1: " . $imei1 . "\n");
    $printer->text("IMEI 2: " . $imei2 . "\n");
    $printer->text("Precio: $" . number_format($precio, 2, ".", ",") . "\n");
    $printer->text("Descuento: $" . number_format($descuento, 2, ".", ",") . "\n");
    $printer->text("Total: $" . $total . "\n");

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

