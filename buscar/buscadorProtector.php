<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT m.marca, e.nombre as nombre_tipo, c.cantidad, d.nombre, d.muro, f.nombre
    as nombre_modelo FROM modelo_funda a
    INNER JOIN protectores b ON a.id_protector = b.id_protector
    INNER JOIN tipo_protector c ON b.id_protector = c.id_protector
    INNER JOIN posicion d ON d.id_posicion = b.posicion
    INNER JOIN nombre_tipo_protector e ON c.tipo = e.id_nombreTipo
    INNER JOIN modelos f ON f.id_modelo = a.tipo_modelo
    INNER JOIN marca m ON m.id_marca = b.marca
    WHERE f.nombre LIKE '%$q%';";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['marca']. "</td>".
        "<td>" . $row['nombre_modelo']. "</td>".
        "<td>" . $row['nombre_tipo']. "</td>".
        "<td>" . $row['cantidad']. "</td>".
        "<td>" . $row['nombre']. "</td>".
        "<td>" . $row['muro']. "</td>".

        "</tr>";
        
    }
}

buscar();

?>