<?php
require_once '../conexion.php';
if (isset($_POST['busca'])) {
    buscar();
}
function buscar()
{
    $mysqli = getConnexion();
    $q = $mysqli->real_escape_string($_POST['busca']);
    $query = "SELECT CONCAT (m.marca, ' ',  c.modelo, ' ', c.almacenamiento, 'gb ', c.red, 'G + ',  c.ram, 'gb RAM') as modelo,
    c.id_celular 
    FROM celular c
    INNER JOIN marca m ON m.id_marca = c.FK_marca
    WHERE  c.id_celular = '$q' or c.imei1 = '$q' or c.imei2 = '$q' and estado_venta = 1";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<p><b>Telefono: </b>" . $row['modelo'] . "</p>";
    }
}

