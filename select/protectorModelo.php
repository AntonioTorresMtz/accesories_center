<?php
include '../db.php';
$marca = $_POST['marca'];

    $query = "SELECT a.nombre, b.id_protector FROM modelo_funda b
    INNER JOIN modelos a
    ON b.tipo_modelo = a.id_modelo
    INNER JOIN protectores c
    ON  c.id_protector = b.id_protector
    WHERE c.marca = '$marca'";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio' disabled selected>-- Selecciona un modelo --</option>";
    while($row = $resultado->fetch_assoc()){
        $html = $html . "<option value='".$row["id_protector"] ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>