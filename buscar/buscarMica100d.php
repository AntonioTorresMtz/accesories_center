<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT a.modelo, b.marca, b.cantidad, d.nombre, d.muro FROM nombre_mica100d a INNER JOIN micas100d b ON a.id_mica100d = b.id_mica100d 
    INNER JOIN posicion d ON d.id_posicion = b.posicion
    WHERE a.modelo LIKE '%$q%';";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['marca']. "</td>".
        "<td>" . $row['modelo']. "</td>".
        "<td>" . $row['cantidad']. "</td>".
        "<td>" . $row['nombre']. "</td>".      
        "<td>" . $row['muro']. "</td>".

        "</tr>";
        
    }
}

buscar();

?>