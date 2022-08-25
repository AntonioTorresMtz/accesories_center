<?php
include '../db.php';
$producto = $_POST['producto'];

    $query = "SELECT a.id_mica9d, b.modelo FROM micas9d a INNER JOIN nombre b
    ON a.id_mica9d = b.id_mica WHERE a.marca = '$producto' ORDER BY modelo ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio'>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id_mica9d"] . "-" . $row["modelo"];
        $html = $html . "<option value='".$valor ."'>".$row["modelo"] . "</option>"; 
    }
    echo $html;
  
?>