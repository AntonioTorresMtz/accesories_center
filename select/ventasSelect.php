<?php
include '../db.php';
$producto = $_POST['producto'];

    $query = "SELECT a.id_mica9h, b.modelo FROM micas9h a INNER JOIN nombre_mica9h b
    ON a.id_mica9h = b.id_mica9h WHERE a.marca = '$producto' ORDER BY modelo ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio'>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $html = $html . "<option value='".$row["id_mica9h"] ."'>".$row["modelo"] . "</option>"; 
    }
    echo $html;
  
?>