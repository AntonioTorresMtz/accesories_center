<?php
include '../db.php';
$marca = $_POST['producto'];
$query = "SELECT mo.nombre, mo.id_modelo
            FROM modelos mo
            INNER JOIN marca ma ON ma.id_marca = mo.marca
            WHERE ma.id_marca = '$marca'
            AND NOT EXISTS (
                SELECT 1
                FROM rel_mica_camara_modelo rm
                WHERE rm.FK_modelo = mo.id_modelo
            ) ORDER BY mo.nombre ASC;";

$resultado = mysqli_query($conn, $query);

$html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
while ($row = $resultado->fetch_assoc()) {
    $valor = $row["id_modelo"];
    $html = $html . "<option value='" . $valor . "'>" . $row["nombre"] . "</option>";
}
echo $html;

?>