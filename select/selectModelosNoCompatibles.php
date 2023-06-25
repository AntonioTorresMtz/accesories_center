<?php
include '../db.php';
$marca = $_POST['marca'];
$id = $_POST['id'];
$producto = intval($_POST['producto']);
$query = '';
switch ($producto) {
    case 1:
        $query = "SELECT m.nombre, m.id_modelo
        FROM modelos m
        LEFT JOIN nombre_mica9h n ON n.nombre_modelo = m.id_modelo AND n.id_mica9h = '$id'
        WHERE m.marca = '$marca' AND n.nombre_modelo IS NULL
        ORDER BY m.nombre ASC;";
        break;
    case 2:
        $query = "SELECT m.nombre, m.id_modelo
        FROM modelos m
        LEFT JOIN nombre n ON n.nombre_modelo = m.id_modelo AND n.id_mica = '$id'
        WHERE m.marca = '$marca' AND n.nombre_modelo IS NULL
        ORDER BY m.nombre ASC;";
        break;
    case 3:
        $query = "SELECT m.nombre, m.id_modelo
        FROM modelos m
        LEFT JOIN nombre_mica100d n ON n.nombre_modelo = m.id_modelo AND n.id_mica100d = '$id'
        WHERE m.marca = '$marca' AND n.nombre_modelo IS NULL
        ORDER BY m.nombre ASC";
        break;
    case 4:
        $query = "SELECT m.nombre, m.id_modelo
        FROM modelos m
        LEFT JOIN nombre_micacamara n ON n.modelo = m.id_modelo AND n.id_micaCamara = '$id'
        WHERE m.marca = '$marca' AND n.modelo IS NULL
        ORDER BY m.nombre ASC;";
        break;
    case 5:
        $query = "SELECT m.nombre, m.id_modelo
        FROM modelos m
        LEFT JOIN nombre_micacurva n ON n.nombre_modelo = m.id_modelo AND n.id_micaCurva = '$id'
        WHERE m.marca = '$marca' AND n.nombre_modelo IS NULL
        ORDER BY m.nombre ASC;";
        break;
    case 6:
        $query = "SELECT m.nombre, m.id_modelo
        FROM modelos m
        LEFT JOIN modelo_funda n ON n.tipo_modelo = m.id_modelo AND n.id_protector = '$id'
        WHERE m.marca = '$marca' AND n.tipo_modelo IS NULL
        ORDER BY m.nombre ASC;";
        break;
}



$resultado = mysqli_query($conn, $query);

$html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
while ($row = $resultado->fetch_assoc()) {
    $valor = $row["id_modelo"];
    $html = $html . "<option value='" . $valor . "'>" . $row["nombre"] . "</option>";
}
echo $html;

?>