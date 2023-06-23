<?php
include('../db.php');
session_start();
/*Recibimos las variables*/
$muro = $_POST["muro"];
$posicion = $_POST["posicion"];
$id = $_POST["id"];
$id_tipo = $_POST["id_tipo"];
$cantidad = $_POST["cantidad"];
$notas = $_POST["notas"];

/* Se convierten todos los elementos de los arreglos a enteros */
$id_tipo = array_map('intval', $id_tipo);
$cantidad = array_map('intval', $cantidad);

/*Convertimos los arreglos a JSON*/
$json_tipo = json_encode($id_tipo);
$json_cantidad = json_encode($cantidad);

echo $json_tipo;
echo "<br>";
echo $json_cantidad;

/*Mandamos llamar a la SP que actualizara los datos */

$sp = "SP_UPDATE_PROTECTORES";
$resultado = mysqli_query($conn, "CALL $sp ('$notas', '$posicion', '$id', '$json_tipo', '$json_cantidad')");

if (!$resultado) {
    echo 'Error consulta al programador <br>';
    //printf("Errormessage: %s\n", $conn->error);
} else {
    mysqli_close($conn);
    $_SESSION['edG_m9d'] = "Fusion hecha";
    header("Location: ../index.php");
    exit();
}
?>