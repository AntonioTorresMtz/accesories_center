<?php
include '../db.php';
$modelo = $_POST['model'];
$producto = intval($_POST['producto']);
$id_modelo = $_POST['id_modelo'];

/*  $query = "SELECT a.nombre, b.id_mica, a.id_modelo FROM nombre b
  INNER JOIN modelos a
  ON a.id_modelo = b.nombre_modelo
  INNER JOIN micas9d c
  ON c.id_mica9d = b.id_mica
  WHERE a.marca = '$producto'
  ORDER BY a.nombre ASC"; */
switch ($producto) {
    case 1:
        $query = "SELECT m.id_modelo, CONCAT(ma.marca, ' ', m.nombre) AS modelo_marca FROM modelos m 
        INNER JOIN nombre_mica9h nm ON nm.nombre_modelo = m.id_modelo
        INNER JOIN marca ma ON ma.id_marca = m.marca
        WHERE nm.id_mica9h = '$modelo' and m.id_modelo != '$id_modelo'
        ORDER BY modelo_marca ASC";
        break;
    case 2:
        $query = "SELECT m.id_modelo, CONCAT(ma.marca, ' ', m.nombre) AS modelo_marca FROM modelos m 
        INNER JOIN nombre nm ON nm.nombre_modelo = m.id_modelo
        INNER JOIN marca ma ON ma.id_marca = m.marca
        WHERE nm.id_mica = '$modelo' and m.id_modelo != '$id_modelo'
        ORDER BY modelo_marca ASC";
        break;
    case 3:
        $query = "SELECT m.id_modelo, CONCAT(ma.marca, ' ', m.nombre) AS modelo_marca FROM modelos m 
        INNER JOIN nombre_mica100d nm ON nm.nombre_modelo = m.id_modelo
        INNER JOIN marca ma ON ma.id_marca = m.marca
        WHERE nm.id_mica100d = '$modelo' and m.id_modelo != '$id_modelo'
        ORDER BY modelo_marca ASC";
        break;
    case 4:
        $query = "SELECT m.id_modelo, CONCAT(ma.marca, ' ', m.nombre) AS modelo_marca FROM modelos m 
        INNER JOIN nombre_micacamara nm ON nm.modelo = m.id_modelo
        INNER JOIN marca ma ON ma.id_marca = m.marca
        WHERE nm.id_micaCamara = '$modelo' and m.id_modelo != '$id_modelo'
        ORDER BY modelo_marca ASC";
        break;
    case 5:
        $query = "SELECT m.id_modelo, CONCAT(ma.marca, ' ', m.nombre) AS modelo_marca FROM modelos m 
        INNER JOIN nombre_micacurva nm ON nm.nombre_modelo = m.id_modelo
        INNER JOIN marca ma ON ma.id_marca = m.marca
        WHERE nm.id_micaCurva = '$modelo' and  m.id_modelo != '$id_modelo'
        ORDER BY modelo_marca ASC";
        break;
    case 6:
        $query = "SELECT m.id_modelo, CONCAT(ma.marca, ' ', m.nombre) AS modelo_marca FROM modelos m 
        INNER JOIN modelo_funda nm ON nm.tipo_modelo = m.id_modelo
        INNER JOIN marca ma ON ma.id_marca = m.marca
        WHERE nm.id_protector = '$modelo' and m.id_modelo != '$id_modelo'
        ORDER BY modelo_marca ASC";
        break;
    default:
        $query = "SELECT 'sin resultados'";
}

$resultado = mysqli_query($conn, $query);
$cont_filas = 0;
$html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
while ($row = $resultado->fetch_assoc()) {
    $valor = $row["id_modelo"];
    $html = $html . "<option value='" . $valor . "'>" . $row["modelo_marca"] . "</option>";
    $cont_filas = $cont_filas + 1;
}

if ($cont_filas == 0) {
    $html = $html . "<option value='1' disabled>-- Sin compatibilidades --</option>";
}
echo $html;

?>