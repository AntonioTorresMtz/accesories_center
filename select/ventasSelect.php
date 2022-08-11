<?php
include '../db.php';
$producto = $_POST['producto'];

if($producto == "9h"){
    $query = "SELECT a.id_mica9h, b.modelo FROM micas9h a INNER JOIN nombre_mica9h b
    ON a.id_mica9h = b.id_mica9h ORDER BY modelo ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio'>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $html = $html . "<option value='".$row["id_mica9h"] ."'>".$row["modelo"] . " 9h     " . "</option>"; 
    }
    echo $html;
} elseif ($producto == "9d"){
    $query = "SELECT a.id_mica9d, b.modelo FROM micas9d a INNER JOIN nombre b
    ON a.id_mica9d = b.id_mica";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio'>--Selecciona Producto--</option>";
    while($row = $resultado->fetch_assoc()){
        $html = $html . "<option value='".$row["id_mica9h"] ."'>".$row["modelo"] . " 9d </option>"; 
    }
    echo $html . "9d";  
}
    
?>