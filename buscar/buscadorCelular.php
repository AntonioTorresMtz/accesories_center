<?php


require_once '../conexion.php';
if (!isset($_POST['busca'])) {
    defecto();
}else{
    buscar();
}


function buscar()
{
    $mysqli = getConnexion();
    $q = $mysqli->real_escape_string($_POST['busca']);
    $query = "SELECT c.id_celular, m.marca, c.almacenamiento, c.modelo, c.ram,
    c.red, c.imei1, c.imei2, c.precio_sugerido, c.estado
    FROM celular c
    INNER JOIN marca m ON m.id_marca = c.FK_marca
    WHERE  c.id_celular = '$q' or c.imei1 = '$q' or c.imei2 = '$q'";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        if ($row['estado'] == 0) {
            $condicion = 'Usado';
        } else {
            $condicion = 'Nuevo';
        }
        echo "<tr> <td>" . $row['id_celular'] . "</td>" .
            "<td>" . $row['marca'] . "</td>" .
            "<td>" . $row['modelo'] . "</td>" .
            "<td>" . $row['almacenamiento'] . "</td>" .
            "<td>" . $row['ram'] . "</td>" .
            "<td>" . $row['red'] . "</td>" .
            "<td>" . $row['imei1'] . "</td>" .
            "<td>" . $row['imei2'] . "</td>" .
            "<td>" . $condicion . "</td>" .
            "<td>" . $row['precio_sugerido'] . "</td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexion();    
    $query = "SELECT c.id_celular, m.marca, c.almacenamiento, c.modelo, c.ram,
    c.red, c.imei1, c.imei2, c.precio_sugerido, c.estado
    FROM celular c
    INNER JOIN marca m ON m.id_marca = c.FK_marca";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        if ($row['estado'] == 0) {
            $condicion = 'Usado';
        } else {
            $condicion = 'Nuevo';
        }
        echo "<tr> <td>" . $row['id_celular'] . "</td>" .
            "<td>" . $row['marca'] . "</td>" .
            "<td>" . $row['modelo'] . "</td>" .
            "<td>" . $row['almacenamiento'] . "</td>" .
            "<td>" . $row['ram'] . "</td>" .
            "<td>" . $row['red'] . "</td>" .
            "<td>" . $row['imei1'] . "</td>" .
            "<td>" . $row['imei2'] . "</td>" .
            "<td>" . $condicion . "</td>" .
            "<td>" . $row['precio_sugerido'] . "</td>" .
            "</tr>";
    }
}



?>