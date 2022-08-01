<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT a.modelo, b.marca, c.tipo, c.cantidad, d.nombre, d.muro FROM modelo_funda a INNER JOIN protectores b ON a.id_protector = b.id_protector INNER JOIN tipo_protector c ON b.id_protector = c.id_protector INNER JOIN posicion d ON d.id_posicion = b.posicion
    WHERE a.modelo LIKE '%$q%';";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['marca']. "</td>".
        "<td>" . $row['modelo']. "</td>".
        "<td>" . $row['tipo']. "</td>".
        "<td>" . $row['cantidad']. "</td>".
        "<td>" . $row['nombre']. "</td>".
        "<td>" . $row['muro']. "</td>".

        "</tr>";
        
    }
}

buscar();

?>