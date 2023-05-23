<?php
include('../db.php');
// Obtener el ID de venta enviado desde la solicitud AJAX
$idVenta = $_POST['idVenta'];

$sp = "SP_DELETE_VENTA";
$resultado = mysqli_query($conn, "CALL $sp ('$idVenta')");
$response = array();
if (!$resultado) {
    echo 'Error consulta al programador <br>';
    //Respuesta de error
    $response = array(
        'status' => 'error',
        'message' => 'Error al eliminar la venta',
        'error' => $conn->error
    );
} else {
    // Respuesta de éxito
    $response = array(
        'status' => 'success',
        'message' => 'Venta eliminada exitosamente'
    );

}

mysqli_close($conn);
// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>