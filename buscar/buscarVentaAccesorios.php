<?php
include("../db.php");
// Obtener el ID de la venta enviado por la solicitud AJAX
$ventaId = $_POST['ventaId'];
//Realizar la consulta
//$ventaId = 801;

//$q = $mysqli->real_escape_string($_POST['busca']);
$query = "SELECT cantidad, precio, descuento FROM ventas WHERE id_venta = '$ventaId'";
$result = mysqli_query($conn, $query);


if ($result->num_rows > 0) {
    // Obtener los datos de la venta
    $venta = $result->fetch_assoc();

    // Devolver los datos como una respuesta JSON    
    echo json_encode($venta);
} else {
    // No se encontró la venta con el ID especificado
    echo json_encode(null);
}

//$stmt->close();
$conn->close();
?>