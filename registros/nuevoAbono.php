<?php
session_start();
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

include("../vendor/autoload.php");
include '../db.php';
date_default_timezone_set('America/Mexico_City');

$id_apartado = $_POST['id_apartado'];
echo $id_apartado;
$monto = $_POST['monto'];


// Liberar memoria del resultado
$sp = "SP_INSERTAR_ABONO";
$resultado = mysqli_query($conn, "CALL $sp ('$id_apartado', '$monto')");

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

    $query = "SELECT
    e.nombre_estado,
    producto,
    precio,
    nombre_cliente,
    cantidad_restante,
    fecha_inicio,
    DATEDIFF(DATE_ADD(fecha_inicio, INTERVAL 1 MONTH), CURDATE()) AS dias_restantes
    FROM
    tbl_apartado a
    INNER JOIN cat_estado_apartado e ON e.PK_estado_apartado = a.FK_estado_apartado
    WHERE
    pk_apartado = '$id_apartado';";

    $resultado = mysqli_query($conn, $query);
    $fila = mysqli_fetch_assoc($resultado);
    $producto = $fila["producto"];
    $nombre = $fila["nombre_cliente"];
    $estado = $fila["nombre_estado"];
    $fecha_inicio = $fila["fecha_inicio"];
    $dias_restante = $fila["dias_restantes"];
    $precio = $fila["precio"];
    $restante = $fila["cantidad_restante"];

    // Realizar las operaciones de impresión
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    //$printer->setFontSize(2, 2);
    // Imprimir imagen
    $image = EscposImage::load("../phone.png");
    $printer->graphics($image);


    $printer->text("Center Accesories\n");
    $printer->text("Hidalgo #151, Ario de Rosales\n");
    $printer->text(date('d-m-Y') . "  " . date('H:i:s') . "\n");
    $printer->text("\n");
    //$printer->bitImage($logo);
    $printer->text("TICKET DE APARTADO\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Cliente: " . $nombre . "\n");
    $printer->text("Producto: " . $producto . "\n");
    $printer->text("Estado: " . $estado . "\n");
    $printer->text("Valor total: $" . number_format($precio, 2, ".", ",") . "\n");
    $printer->text("Restante: $" . number_format($restante, 2, ".", ",") . "\n");
    $printer->text("Dias restantes para liquidar:" . $dias_restante);
    $printer->text("\n");

    //---DESGLOCE DE ABONOS ---
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("\n");
    $printer->text("----- ABONOS -----");
    $printer->text("\n");
    $printer->text("\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);

    $num_abono = 1;
    $query2 = "SELECT fecha_pago, monto FROM tbl_pagos p
                        INNER JOIN rel_apartado_pago r ON r.FK_pago = p.PK_pago
                        INNER JOIN tbl_apartado a ON a.PK_apartado = r.FK_apartado
                        WHERE pk_apartado = '$id_apartado';";
    $res = $conn->query($query2);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        $printer->text("Abono numero " . $num_abono);
        $printer->text("\n");
        $printer->text("Fecha " . $row['fecha_pago']);
        $printer->text("\n");
        $printer->text("Cantidad $" . number_format($row['monto'], 2, ".", ","));
        $printer->text("\n");
        $printer->text("\n");
        $num_abono = $num_abono + 1;
    }



    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("El producto adquirido cuenta con un mes de garantia al momento de su compra.\n");
    $printer->text("\n");
    $printer->text("Gracias por la preferencia :)\n");
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");
    $printer->cut();

    // Cerrar la conexión de impresión
    $printer->close();

    $_SESSION['exito'] = "2";
    header("Location: ../menuApartados.php");
    exit();
}





?>