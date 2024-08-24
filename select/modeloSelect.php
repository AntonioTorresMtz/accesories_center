<?php
include '../db.php';
$marca = $_POST['producto'];

  /*  $query = "SELECT a.nombre, b.id_mica, a.id_modelo FROM nombre b
    INNER JOIN modelos a
    ON a.id_modelo = b.nombre_modelo
    INNER JOIN micas9d c
    ON c.id_mica9d = b.id_mica
    WHERE a.marca = '$producto'
    ORDER BY a.nombre ASC"; */

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