<?php
include 'conexion.php';

if (isset($_POST['tipoId'])) {
    $tipoId = $_POST['tipoId'];
    $query = "SELECT * FROM nombre_tipo_protector WHERE id_nombreTipo = $tipoId";
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado);
    echo json_encode($row);
}
?>