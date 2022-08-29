<?php
include '../db.php';
$modelo = $_POST['modelo'];

$query = "SELECT b.nombre, c.cantidad FROM modelos b 
INNER JOIN nombre_mica9h a
ON b.id_modelo = a.nombre_modelo
INNER JOIN  micas9h c
ON a.id_mica9h = c.id_mica9h
WHERE c.id_mica9h = '$modelo'";

    $resultado = mysqli_query($conn, $query);
    $cantidad = 0;
    $html = "";
    while($row = $resultado->fetch_assoc()){
        $cantidad = $row["cantidad"];
        $html = $html . $row["nombre"] . ", ";
    }
    echo $modelo . "Cantidad actual: " .$cantidad . "<br>". "Modelos compatibles: ".$html;
  
?>