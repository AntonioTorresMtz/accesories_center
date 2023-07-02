<?php
include '../db.php';
$modelo = $_POST['modelo'];

$query = "SELECT b.nombre, c.cantidad FROM modelos b 
INNER JOIN nombre_micacamara a
ON b.id_modelo = a.modelo
INNER JOIN  micas_camara c
ON a.id_micaCamara = c.id_micaCamara
WHERE c.id_micaCamara= '$modelo'";

    $resultado = mysqli_query($conn, $query);
    $cantidad = 0;
    $html = "";
    while($row = $resultado->fetch_assoc()){
        $cantidad = $row["cantidad"];
        $html = $html . $row["nombre"] . ", ";
    }
    $html = substr($html, 0, (strlen($html)-2));
    echo " Cantidad actual: " .$cantidad . "<br>". "Modelos compatibles: ".$html;
  
?>