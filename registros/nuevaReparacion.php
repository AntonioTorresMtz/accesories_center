<?php
session_start();
include '../db.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$nombre_cliente = $_POST['nombre_cliente'];
$telefono = empty($_POST['telefono']) ? null : $_POST['telefono'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$servicio = $_POST['servicio'];
$presupuesto = $_POST['presupuesto'];
$abono = $_POST['abono'];
$envio = $_POST['envio'];
$descripcion_problema = empty($_POST['descripcion_problema']) ? null : $_POST['descripcion_problema'];
$contrasena = empty($_POST['contrasena']) ? null : $_POST['contrasena'];

$sp = "SP_INSERTAR_REPARACION";
$stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$producto = 7;
if ($stmt) {
    // Asignamos los valores a los parámetros usando bind_param
    mysqli_stmt_bind_param(
        $stmt,
        "ssiisddss",
        $nombre_cliente,
        $telefono,
        $marca,
        $modelo,
        $servicio,
        $presupuesto,
        $abono,
        $descripcion,
        $contrasena
    );
    // Ejecutamos la consulta
    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        // imprimirSeguimiento($FK_venta, $nombre_cliente, $descripcion, $caja, $accesorios, $contrasena, $formateado, $ticket_compra);
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

function imprimirTicket($nombre_cliente, $telefono, $modelo, $servicio, $presupuesto, $abono, $descripcion, $envio)
{
    $costo_envio = $envio == 0 ? 150 : 0;
    include '../db.php';

    $sql = "SELECT m.marca, mo.nombre FROM marca m
            INNER JOIN modelos mo ON mo.marca = m.id_marca
            WHERE mo.id_modelo = '$modelo';";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

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
    $printer->text("\n");
    $printer->text("NOTA DE RECIBIDO\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Cliente: " . $nombre_cliente . "\n");
    $printer->text("Servicio: " . $row["modelo"] . "\n");
    $printer->text("Modelo: " . $row["marca"] . " " . $row["modelo"] . "\n");
    $printer->text("Problema de equipo: " . $telefono . "\n");
    $printer->text("Cotizacion: " . $presupuesto . "\n");
    $printer->text("Costo de Envio: " . $costo_envio . "\n");
    $printer->text("Abono: " . $abono . "\n");
    
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("El cliente cuenta con un mes de garantia en caso de calquier falla por defecto de fabrica en piezas\n");
    $printer->text("Asi mismo tendra 60 dias para recoger su equipo a partir de la fecha en que se haya avisado\n");
    $printer->text("De lo contrario el equipo se rematara para cubrir los costos que genero el equipo.\n");
    $printer->cut();
    // Cerrar la conexión de impresión
    $printer->close();
}

mysqli_close($conn);
