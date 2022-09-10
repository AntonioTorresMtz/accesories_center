<?php
include '../db.php';
$modelo = $_POST['modelo'];

$query = "SELECT b.nombre, c.cantidad FROM modelos b 
INNER JOIN nombre_micacurva a
ON b.id_modelo = a.nombre_modelo
INNER JOIN  micascurva c
ON a.id_micaCurva = c.id_micaCurva
WHERE c.id_micaCurva = '$modelo'";

    $resultado = mysqli_query($conn, $query);
    $cantidad = 0;
    $html = "";
    while($row = $resultado->fetch_assoc()){
        $cantidad = $row["cantidad"];
        $html = $html . $row["nombre"] . ", ";
    }
    echo $modelo . "Cantidad actual: " .$cantidad . "<br>". "Modelos compatibles: ".$html;
  
?>