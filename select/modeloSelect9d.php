<?php
include '../db.php';
$marca = $_POST['producto'];

$query = "SELECT a.nombre, a.id_modelo, c.id_mica9d FROM nombre b
    INNER JOIN modelos a
    ON a.id_modelo = b.nombre_modelo
    INNER JOIN micas9d c
    ON c.id_mica9d = b.id_mica
    WHERE a.marca = '$marca'
    ORDER BY a.nombre ASC";

$resultado = mysqli_query($conn, $query);

$html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
while ($row = $resultado->fetch_assoc()) {
    $valor = $row["id_mica9d"];
    $html = $html . "<option value='" . $valor . "' data-idmodelo='" . $row["id_modelo"] . "'>" . $row["nombre"] . "</option>";
}
echo $html;

?>