<?php
include '../db.php';
$producto = $_POST['producto'];

switch($producto){
    case 1: 
        echo "Hola";
        break;
    case 2:
        $query = "SELECT a.nombre, c.id_mica9d FROM nombre b
        INNER JOIN modelos a
        ON a.id_modelo = b.nombre_modelo
        INNER JOIN micas9d c
        ON c.id_mica9d = b.id_mica
        WHERE a.marca = '$marca'
        ORDER BY a.nombre ASC";
        break;
}


$resultado = mysqli_query($conn, $query);

$html = "<option value='0' disabled selected>--Selecciona Modelo--</option>";
while($row = $resultado->fetch_assoc()){
    $valor = $row["id_mica9d"] ;
    $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "</option>"; 
}
echo $html;
  
?>