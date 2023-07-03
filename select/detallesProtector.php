<?php
include '../db.php';
$modelo = $_POST['modelo'];

$patron = "/^([0-9]+)(-)([0-9]+)$/";
//$patron = "/^([0-9]+)(-)([a-zA-Z0-9\'.\s]{1,30})$/";

$encontrado = preg_match($patron, $modelo, $coincidencias, PREG_OFFSET_CAPTURE);;
$id_protector = 0;
if ($encontrado) {
    $id_protector = $coincidencias[1][0] ."<br>";

    $query = "SELECT b.nombre  FROM modelos b 
    INNER JOIN modelo_funda a
    ON b.id_modelo = a.tipo_modelo
    INNER JOIN  protectores c
    ON a.id_protector = c.id_protector
    WHERE c.id_protector = '$id_protector'";

        $resultado = mysqli_query($conn, $query);
        $cantidad = 0;
        $html = "";
        while($row = $resultado->fetch_assoc()){
            //$cantidad = $row["cantidad"];
            $html = $html . $row["nombre"] . ", ";
        }
        $html = substr($html, 0, strlen($html)-2);
        $html = "Modelos compatibles: ".$html . "<br>";

        $query2 = "SELECT a.cantidad, b.nombre FROM tipo_protector a
        INNER JOIN nombre_tipo_protector b
        ON a.tipo = b.id_nombreTipo
        INNER JOIN protectores c
        ON c.id_protector = a.id_protector
        WHERE a.id_protector = '$id_protector'";
    
        $resultado = mysqli_query($conn, $query2);
    
        while($row = $resultado->fetch_assoc()){
            //$cantidad = $row["cantidad"];
            $html = $html . $row["nombre"] . ": " . $row["cantidad"] . "<br>";
        }

        echo $html;
    }

?>