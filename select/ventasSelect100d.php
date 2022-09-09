<?php
include '../db.php';
$producto = $_POST['producto'];

    $query = "SELECT a.nombre, b.id_mica100d, a.id_modelo FROM nombre_mica100d b
    INNER JOIN modelos a
    ON a.id_modelo = b.nombre_modelo
    INNER JOIN micas100d c
    ON c.id_mica100d = b.id_mica100d
    WHERE a.marca = '$producto'
    ORDER BY a.nombre ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio' disabled selected>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id_mica100d"] . "-" . $row["id_modelo"];
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "  ".$row["id_mica100d"] ."</option>"; 
    }
    echo $html;
  
?>