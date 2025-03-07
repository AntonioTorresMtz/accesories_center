<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT mo.nombre AS model, ma.marca, ancho, largo, nombre FROM modelos mo
    INNER JOIN marca ma ON ma.id_marca = mo.marca
    INNER JOIN nombre_mica9h nm9h ON nm9h.nombre_modelo = mo.id_modelo
    INNER JOIN micas9h m9h ON m9h.id_mica9h = nm9h.id_mica9h
    WHERE mo.nombre LIKE '%$q%';";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['marca']. "</td>".
        "<td>" . $row['model']. "</td>".
        "<td>" . $row['ancho']. "</td>".
        "<td>" . $row['largo']. "</td>".
        "<td>" . $row['nombre']. "</td>".
        "</tr>";
        
    }
}

buscar();

?>

