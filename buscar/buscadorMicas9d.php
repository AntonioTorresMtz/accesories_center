<?php
if(!isset($_POST['busca'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

function buscar(){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);
    $query="SELECT e.nombre as model, d.marca, b.ancho, b.largo, c.nombre FROM nombre a
    INNER JOIN micas9d b ON b.id_mica9d = a.id_mica
    INNER JOIN posicion c ON c.id_posicion = b.posicion
    INNER JOIN modelos e ON e.id_modelo = a.nombre_modelo
    INNER JOIN marca d ON d.id_marca = e.marca
    
     WHERE e.nombre like '%$q%'";

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

