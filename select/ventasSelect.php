<?php
include '../db.php';
$producto = $_POST['producto'];

$query = "SELECT a.nombre, b.id_mica9h, a.id_modelo FROM nombre_mica9h b
INNER JOIN modelos a
ON a.id_modelo = b.nombre_modelo
INNER JOIN micas9h c
ON c.id_mica9h = b.id_mica9h
WHERE a.marca = '$producto'
ORDER BY a.nombre ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='0'>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id_mica9h"] . "-" . $row["id_modelo"];
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>