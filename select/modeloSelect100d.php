<?php
include '../db.php';
$marca = $_POST['producto'];

    $query = "SELECT a.nombre, c.id_mica100d FROM nombre_mica100d b
    INNER JOIN modelos a
    ON a.id_modelo = b.nombre_modelo
    INNER JOIN micas100d c
    ON c.id_mica100d = b.id_mica100d
    WHERE a.marca = '$marca'
    ORDER BY a.nombre ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio' disabled selected>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id_mica100d"] ;
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>