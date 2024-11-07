<?php
session_start();
include '../db.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$FK_venta = $_POST['venta_celular'];
$nombre_cliente = $_POST['nombre_cliente'];
$descripcion = $_POST['descripcion_falla'];
$telefono = $_POST['telefono'];
$observaciones = '';
$ticket_compra = $_POST['ticket_compra'];
$caja = $_POST['caja'];
$accesorios = $_POST['accesorios'];
$contrasena = $_POST['contrasena'];
$formateado = $_POST['formateado'];

if (empty($_POST['observaciones'])) {
    $observaciones = null;
} else {
    $observaciones = $_POST['observaciones'];
}

$sp = "SP_INSERTAR_TICKET_GARANTIA";
$stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$producto = 7;
if ($stmt) {
    // Asignamos los valores a los parámetros usando bind_param
    mysqli_stmt_bind_param(
        $stmt,
        "issssiiiii",
        $FK_venta,
        $descripcion,
        $nombre_cliente,
        $telefono,
        $observaciones,
        $ticket_compra,
        $caja,
        $accesorios,
        $contrasena,
        $formateado
    );
    // Ejecutamos la consulta
    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        imprimirSeguimiento($FK_venta, $nombre_cliente, $descripcion, $caja, $accesorios, $contrasena, $formateado, $ticket_compra);
        $_SESSION['exito'] = "4";
        header("Location: ../garantias_menu.php");
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

function imprimirSeguimiento($FK_venta, $nombre_cliente, $problema, $caja, $accesorios, $contrasena, $formateado, $ticket_compra)
{
    include '../db.php';

    $sql = "SELECT CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
        c.imei1 FROM celular c 
        INNER JOIN venta_celular vc ON vc.FK_celular = c.id_celular
        INNER JOIN marca m ON m.id_marca = c.FK_marca
        WHERE vc.PK_venta = '$FK_venta';";

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
    $printer->text("TICKET GARANTIA\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Celular: " . $row["modelo"] . "\n");    
    $printer->text("IMEI: " . $row["imei1"] . "\n");
    $printer->text("Cliente: " . $nombre_cliente . "\n");
    $printer->text("\n");
    $printer->text("Problema de equipo:\n");
    $printer->text($problema . "\n");
    $printer->text("\n");
    $printer->text("Entrego ticket de compra: " . convertirBooleano($ticket_compra) . "\n");
    $printer->text("Entrego caja: " . convertirBooleano($caja) . "\n");
    $printer->text("Entrego todos accesorios: " . convertirBooleano($accesorios) . "\n");
    $printer->text("Viene sin contraseña: " . convertirBooleano($contrasena) . "\n");
    $printer->text("Viene formateado: " . convertirBooleano($formateado) . "\n");

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("El proceso de solucion varia dependiendo de la falla, esto varia de 7 dias hasta 22 dias,
    tratamos de agilizar el tiempo de solucion al menor posible, agradecemos su espera.\n");
    $printer->cut();
    // Cerrar la conexión de impresión
    $printer->close();
}

mysqli_close($conn);
