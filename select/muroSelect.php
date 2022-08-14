<?php
include '../db.php';
$muro = $_POST['muro'];

    $query = "SELECT id_posicion, nombre FROM `posicion` WHERE muro = '$muro' ORDER BY nombre ASC";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='vacio' disabled selected>--Selecciona una Posicion--</option>";
    while($row = $resultado->fetch_assoc()){
        $html = $html . "<option value='".$row["id_posicion"] ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>