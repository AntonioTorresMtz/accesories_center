<?php
include '../db.php';
$producto = $_POST['producto'];

$query = "SELECT a.nombre, b.id_protector AS id, a.id_modelo AS modelo FROM modelo_funda b
INNER JOIN modelos a
ON a.id_modelo = b.tipo_modelo
INNER JOIN protectores c
ON c.id_protector = b.id_protector
WHERE a.marca = '$producto'
ORDER BY a.nombre ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='0'>--Selecciona  Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id"] . "-" . $row["modelo"];
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . " id:" . $row["id"] . "</option>"; 
    }
    echo $html;
  
?>