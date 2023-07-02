<?php
include '../db.php';
$modelo = $_POST['modelo'];

$query = "SELECT b.nombre, c.cantidad FROM modelos b 
INNER JOIN nombre_mica100d a
ON b.id_modelo = a.nombre_modelo
INNER JOIN  micas100d c
ON a.id_mica100d = c.id_mica100d
WHERE c.id_mica100d = '$modelo'";

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