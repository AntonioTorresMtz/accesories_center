<?php
include '../db.php';
$marca = $_POST['producto'];

    $query= "SELECT a.nombre, a.id_modelo
    FROM modelos a
    LEFT JOIN modelo_funda mf ON mf.tipo_modelo = a.id_modelo
    WHERE mf.tipo_modelo IS NULL AND a.marca = '$marca'
    ORDER BY a.nombre ASC;";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id_modelo"];
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>