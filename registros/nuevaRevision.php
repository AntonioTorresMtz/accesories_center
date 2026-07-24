<?php
session_start();
date_default_timezone_set('America/Mexico_City');
require_once('../db.php');
$conn = conectar();

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$nombre_cliente = $_POST['nombre_cliente'];
$telefono = empty($_POST['telefono']) ? null : $_POST['telefono'];
$_POST['marca'] == 0 ? $marca = null :  $marca = $_POST['marca'];
$modelo = ($_POST['marca'] == 0) ? null : ($_POST['modelo'] ?? null);
$modeloNuevo = $_POST['modeloNuevo'];
$descripcion_problema = empty($_POST['descripcion_problema']) ? null : $_POST['descripcion_problema'];
$contrasena = empty($_POST['contrasena']) ? null : $_POST['contrasena'];
$servicio = null;
$presupuesto = 0;
$abono = 0;
$envio = 0;
$revision = 1;

$sp = "SP_INSERTAR_REPARACION";
$stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$producto = 7;
if ($stmt) {
    // Asignamos los valores a los parámetros usando bind_param
    mysqli_stmt_bind_param(
        $stmt,
        "ssiisddssisi",
        $nombre_cliente,
        $telefono,
        $marca,
        $modelo,
        $servicio,
        $presupuesto,
        $abono,
        $descripcion,
        $contrasena,
        $envio,
        $modeloNuevo,
        $revision
    );
    // Ejecutamos la consulta
    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        imprimirTicket($nombre_cliente, $telefono, $modelo, $marca, $modeloNuevo, $descripcion, 1);
        imprimirTicket($nombre_cliente, $telefono, $modelo, $marca, $modeloNuevo, $descripcion, 0);

        $_SESSION['exito'] = "4";
        header("Location: ../reparaciones.php");
        exit();
    } else {
        //echo "Error ejecutando la consulta: " . mysqli_stmt_error($stmt);
        $_SESSION['error'] = mysqli_error($conn);
        echo $_SESSION['error'];
        header("Location: ../garantias_menu.php");
        exit();
    }
}

function convertirBooleano($booleano)
{
    return $booleano == 1 ? "Si" : "No";
}

function imprimirTicket($nombre_cliente, $telefono, $modelo, $marca, $modeloNuevo, $descripcion, $firma)
{
    $conn = conectar();

    $modeloImpreso = "";

    if ($modelo > 0 and $marca > 0) {
        $sql = "SELECT m.marca, mo.nombre FROM marca m
            INNER JOIN modelos mo ON mo.marca = m.id_marca
            WHERE mo.id_modelo = '$modelo';";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $modeloImpreso = $row["marca"] . " " . $row["nombre"];
    } elseif ($modelo === null and $marca > 0) {
        $sql = "SELECT marca FROM marca WHERE id_marca = '$marca';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $modeloImpreso = $row["marca"]. " " . $modeloNuevo;
        echo "Caso 2";
    } else {
        $modeloImpreso = $modeloNuevo;
    }



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
    $printer->text("NOTA DE RECIBIDO\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Cliente: " . $nombre_cliente . "\n");
    $printer->text("Servicio: Revision de Telefono" . "\n");
    $printer->text("Modelo: " . $modeloImpreso . "\n");
    $printer->text("Telefono de Contacto: " . $telefono . "\n");

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("\n");
    $printer->text("El presupuesto se da una vez detectada la falla del dispositivo.\n");
    $printer->text("Una vez comunicado la falla, el usuario tendra 60 dias para recoger su dispositivo\n");
    $printer->text("De lo contrario el equipo se tira.\n");

    if ($firma == 1) {
        $printer->text("\n");
        $printer->text("\n");
        $printer->text("\n");
        $printer->text("\n");
        $printer->text("\n");
        $printer->text("\n");
        $printer->text("__________________________\n");
        $printer->text("Firma del Cliente");
        $printer->text("\n");
        $printer->text("\n");
    }

    $printer->cut();
    // Cerrar la conexión de impresión
    $printer->close();
}

mysqli_close($conn);
