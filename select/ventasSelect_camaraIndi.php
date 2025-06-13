<?php
include '../db.php';
$marca = $_POST['producto'];

    $query = "SELECT m.nombre, r.FK_mica_camara_individual, m.id_modelo FROM rel_mica_camara_modelo r
                INNER JOIN modelos m ON m.id_modelo = r.FK_modelo
                INNER JOIN tbl_mica_camara_individual mc ON mc.PK_mica_camara = r.FK_mica_camara_individual
                WHERE m.marca = '$marca'
                ORDER BY m.nombre ASC;";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["FK_mica_camara_individual"] . "-" . $row["id_modelo"];
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>