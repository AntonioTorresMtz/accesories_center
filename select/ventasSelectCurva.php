<?php
include '../db.php';
$marca = $_POST['producto'];

    $query = "SELECT a.nombre, c.id_micaCurva, a.id_modelo FROM nombre_micacurva b
    INNER JOIN modelos a
    ON a.id_modelo = b.nombre_modelo
    INNER JOIN micascurva c
    ON c.id_micaCurva = b.id_micaCurva
    WHERE a.marca = '$marca'
    ORDER BY a.nombre ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio' disabled selected>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["id_micaCurva"] . "-" . $row["id_modelo"];
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "  ".$row["id_micaCurva"] ."</option>"; 
    }
    echo $html;
  
?>