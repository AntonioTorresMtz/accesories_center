<?php
include '../db.php';
$producto = $_POST['producto'];

$query = "SELECT a.nombre, a.id_modelo, c.id_mica9h FROM nombre_mica9h b
INNER JOIN modelos a
ON a.id_modelo = b.nombre_modelo
INNER JOIN micas9h c
ON c.id_mica9h = b.id_mica9h
WHERE a.marca = '$producto'
ORDER BY a.nombre ASC";

$resultado = mysqli_query($conn, $query);

$html = "<option value='0'>--Selecciona Modelo--</option>";
while ($row = $resultado->fetch_assoc()) {
    $valor = $row["id_mica9h"];
    $html = $html . "<option value='" . $valor . "' data-idmodelo='" . $row["id_modelo"] . "'>" . $row["nombre"] . "</option>";
}
echo $html;

?>