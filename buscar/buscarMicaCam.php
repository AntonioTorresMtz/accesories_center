<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT e.nombre as mol, m.marca, b.cantidad, d.nombre, d.muro FROM nombre_micaCamara a INNER JOIN micas_camara b ON a.id_micaCamara = b.id_micaCamara 
    INNER JOIN posicion d ON d.id_posicion = b.posicion
    INNER JOIN marca m ON m.id_marca = b.marca
    INNER JOIN modelos e ON a.modelo = e.id_modelo
    WHERE e.nombre LIKE '%$q%'";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['marca']. "</td>".
        "<td>" . $row['mol']. "</td>".
        "<td>" . $row['cantidad']. "</td>".
        "<td>" . $row['nombre']. "</td>".      
        "<td>" . $row['muro']. "</td>".

        "</tr>";
        
    }
}

buscar();
?>