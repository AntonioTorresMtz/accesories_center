<?php
include '../db.php';
$marca = $_POST['marca'];

$query = "SELECT a.nombre, a.id_modelo, b.id_protector FROM modelo_funda b
    INNER JOIN modelos a
    ON b.tipo_modelo = a.id_modelo
    INNER JOIN protectores c
    ON  c.id_protector = b.id_protector
    WHERE a.marca = '$marca'
    ORDER BY a.nombre ASC";

$resultado = mysqli_query($conn, $query);


$html = "<option value='0' disabled selected>-- Seleccionaa un modelo --</option>";
while ($row = $resultado->fetch_assoc()) {
    $html = $html . "<option value='" . $row["id_protector"] . "' data-idmodelo='" . $row["id_modelo"] . "'>" . $row["nombre"] . "</option>";
    $cont_filas = $cont_filas + 1;
}
echo $html;

?>