<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT a.modelo, b.marca, b.ancho, b.largo, c.nombre FROM nombre_mica9h a INNER JOIN micas9h b ON b.id_mica9h = a.id_mica9h
    INNER JOIN posicion c ON c.id_posicion = b.posicion WHERE modelo like '%$q%'";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['marca']. "</td>".
        "<td>" . $row['modelo']. "</td>".
        "<td>" . $row['ancho']. "</td>".
        "<td>" . $row['largo']. "</td>".
        "<td>" . $row['nombre']. "</td>".
        "</tr>";
        
    }
}

buscar();

?>

