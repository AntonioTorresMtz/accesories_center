<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT m.nombre AS model, d.marca, b.ancho, b.largo, c.nombre FROM nombre_mica9h a INNER JOIN micas9h b ON b.id_mica9h = a.id_mica9h
    INNER JOIN posicion c ON c.id_posicion = b.posicion
    INNER JOIN modelos m ON m.id_modelo = a.nombre_modelo
    INNER JOIN marca d  ON d.id_marca = b.marca
    WHERE m.nombre like '%$q%'";

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

