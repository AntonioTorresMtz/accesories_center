<?php
session_start();
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

include("../vendor/autoload.php");
include '../db.php';
date_default_timezone_set('America/Mexico_City');

$id_reparado = $_POST['id_reparado'];
$monto = $_POST['monto'];


// Liberar memoria del resultado
$sp = "SP_INSERTAR_PAGO_REPARACION";
$stmt = mysqli_prepare($conn, "CALL $sp (?, ?)");
if ($stmt) {
    // Asignamos los valores a los parámetros usando bind_param
    mysqli_stmt_bind_param(
        $stmt,
        "id",
        $id_reparado,
        $monto
    );
    // Ejecutamos la consulta
    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        imprimirTicket($id_reparado);

        $_SESSION['exito'] = "4";
        header("Location: ../reparaciones.php");
        exit();
    } else {
        //echo "Error ejecutando la consulta: " . mysqli_stmt_error($stmt);
        $_SESSION['error'] = mysqli_error($conn);
        echo $_SESSION['error'];
        //header("Location: ../garantias_menu.php");
        exit();
    }
}

function convertirBooleano($booleano)
{
    return $booleano == 1 ? "Si" : "No";
}

function imprimirTicket($id_reparado)
{
    include '../db.php';

    $sql = "SELECT r.nombre_cliente, r.servicio, r.presupuesto, r.envio, r.abono, m.nombre, ma.marca FROM tbl_reparacion r
            INNER JOIN modelos m ON m.id_modelo = r.FK_modelo
            INNER JOIN marca ma ON ma.id_marca = r.FK_marca
            WHERE r.PK_reparacion = '$id_reparado';";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $costo_envio = $row["envio"] == 0 ? 0 : 150;

    //Impresion de ticket:
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
    $printer->text("NOTA DE REMISIÓN\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Cliente: " . $row["nombre_cliente"] . "\n");
    $printer->text("Servicio: " . $row["servicio"] . "\n");
    $printer->text("Modelo: " . $row["marca"] . " " . $row["nombre"] . "\n");
    $printer->text("Cotizacion: $" . $row["presupuesto"] . "\n");
    $printer->text("Costo de Envio: $" . $costo_envio . "\n");
    $printer->text("Total: $" . $costo_envio + $row["presupuesto"] . "\n");
    $printer->text("Abono: $" . $row["abono"] .  "\n");
    $printer->text("Restante: $" . $costo_envio + $row["presupuesto"] - $row["abono"] . "\n");

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("\n");
    $printer->text("El equipo cuenta con 1 mes de garantia por defecto de la pieza cambiada, remplazada\n");
    $printer->text("o reparada, la cual debe presentarse en \n");
     $printer->text("buen estado, sin signos de maltratao o mal uso. \n");
    $printer->text("En pantallas la garantia cubre defectos de touch (que no responda el tacto en la pantalla), \n");
    $printer->text("lineas y manchas se deben a un problema fisico (golpe o aplastamiento) lo cual no cubre la garantia.\n");
     $printer->text("\n");
    $printer->text("Equipos mojados no cuenta con garantia ni aquellos que hayan sido manipulados por terceros despues de entregado el equipo.\n");
    $printer->text("\n");
    $printer->text("\n");
     $printer->text("Necesario conservar este ticket para cualquier\n");
     $printer->text("aclaracion.\n");
    $printer->cut();
    // Cerrar la conexión de impresión
    $printer->close();
}

mysqli_close($conn);
