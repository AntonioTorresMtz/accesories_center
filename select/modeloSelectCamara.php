<?php
include '../db.php';
$marca = $_POST['producto'];

    $query = "SELECT a.nombre, c.id_micaCamara FROM nombre_micacamara b
    INNER JOIN modelos a
    ON a.id_modelo = b.modelo
    INNER JOIN micas_camara c
    ON c.id_micaCamara = b.id_micaCamara
    WHERE a.marca = '$marca'
    ORDER BY a.nombre ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id_micaCamara"] ;
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>