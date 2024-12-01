<?php
session_start();
include '../db.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


$id_garantia = $_POST['id_garantia'];
$id_venta = $_POST['id_venta'];
$solucion = $_POST['solucion'];
$monto_rembolso = isset($_POST["rembolso"]) ? $_POST["rembolso"] : null;
$observaciones = $_POST['observaciones'];
$imei = isset($_POST["imei"]) ? $_POST["imei"] : null;
$diferencia = isset($_POST["diferencia"]) ? $_POST["diferencia"] : null;
$monto_diferencia = isset($_POST["monto_diferencia"]) ? $_POST["monto_diferencia"] : null;
$cantidad_efectivo = $diferencia == 1 ? $monto_diferencia : null;
$cantidad_efectivo = isset($_POST["cantidad_efectivo"]) ? $_POST["cantidad_efectivo"] : null;
$especie = isset($_POST["especie"]) ? $_POST["especie"] : null;


if ($solucion != 2) {
    $sp = "SP_INSERTAR_SOLUCION";
    $stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?)");
    if ($stmt) {
        // Asignamos los valores a los parámetros usando bind_param
        mysqli_stmt_bind_param(
            $stmt,
            "idsi",
            $solucion,
            $monto_rembolso,
            $observaciones,
            $id_garantia
        );
        // Ejecutamos la consulta
        if (mysqli_stmt_execute($stmt)) {
            $resultado = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $_SESSION['exito'] = "5";
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
} else {
    $sp = "SP_INSERTAR_SOLUCION_CAMBIO";
    $stmt = mysqli_prepare($conn, "CALL $sp (?, ?, ?, ?, ?,?,?,?,?)");
    if ($stmt) {
        // Asignamos los valores a los parámetros usando bind_param
        mysqli_stmt_bind_param(
            $stmt,
            "isiddsisi",
            $id_venta,
            $imei,
            $diferencia,
            $monto_diferencia,
            $cantidad_efectivo,
            $especie,
            $solucion,
            $observaciones,
            $id_garantia
        );
        // Ejecutamos la consulta
        if (mysqli_stmt_execute($stmt)) {
            $resultado = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            imprimirCambio($imei, $id_venta, $monto_diferencia);
            $_SESSION['exito'] = "5";
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
}

function imprimirCambio($imei, $id_venta, $monto_diferencia)
{
    include '../db.php';

    $sql = "SELECT CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
        c.imei1 FROM celular c 
        INNER JOIN venta_celular vc ON vc.FK_celular = c.id_celular
        INNER JOIN marca m ON m.id_marca = c.FK_marca
        WHERE vc.PK_venta = '$id_venta';";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $modeloViejo = $row["modelo"];
    $imeiViejo = $row["imei1"];

    $sql = "SELECT c.id_celular, m.marca, c.modelo, c.imei1, c.imei2, estado FROM celular c
    INNER JOIN marca m ON  m.id_marca = c.FK_marca
    WHERE id_celular = '$imei' OR imei1 = '$imei';";
    $result = $conn->query($sql);

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
    $printer->text("\n");
    $printer->text("Celular Nuevo\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Celular: " . $marca . " " . $modelo . "\n");
    $printer->text("Esatado del telefono: " . $condicion . "\n");
    $printer->text("IMEI 1: " . $imei1 . "\n");
    $printer->text("IMEI 2: " . $imei2 . "\n");
    $printer->text("\n");
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("Celular Garantia\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Celular: " . $modeloViejo . "\n");
    $printer->text("IMEI: " . $imeiViejo . "\n");
    $printer->text("\n");
    $printer->text("Diferencia de precio: $" . $monto_diferencia . "\n");
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("El producto adquirido cuenta con un mes de garantia al momento de su cambio.\n");
    $printer->text("Dicha garantía cubre cualquier defecto de fabrica, siempre y cuando el producto
        no presente rayaduras, golpes o se encuentre mojado. Debera ser entregado con todos sus accesorios,
        caja y esta nota de compra.\n");
    $printer->text("\n");
    $printer->text("Agradecemos su compra :)\n");

    $printer->cut();
    // Cerrar la conexión de impresión
    $printer->close();
}




mysqli_close($conn);
