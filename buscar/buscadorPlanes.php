<?php


require_once '../conexion.php';
if (!isset($_POST['busca'])) {
    defecto();
    exit("No se encontro el valor");

} else {
    if ($_POST['busca'] == '' || $_POST['busca'] == 'Todos') {
        defecto();
        //echo 'Borrado vacio';
    } else {
        buscar();
        // echo "Buscar";

    }
}


function buscar()
{
    $mysqli = getConnexion();
    $nombre = $mysqli->real_escape_string($_POST['busca']);
    $query = "SELECT p.PK_plan, p.cliente, p.telefono, p.monto, p.fecha, ep.nombre_estado FROM tbl_planes p
                INNER JOIN cat_estado_planes ep ON ep.PK_estado_plan = p.FK_estado
                WHERE p.cliente LIKE '%$nombre%' ORDER BY p.pk_plan DESC LIMIT 100;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_plan'] . "</td>" .
            "<td>" . $row['cliente'] . "</td>" .
            "<td>" . $row['telefono'] . "</td>" .
            "<td> $" . $row['monto'] . "</td>" .
            "<td>" . $row['fecha'] . "</td>" .
            "<td>" . $row['nombre_estado'] . "</td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexion();
    $query = "SELECT p.PK_plan, p.cliente, p.telefono, p.monto, p.fecha, ep.nombre_estado FROM tbl_planes p
INNER JOIN cat_estado_planes ep ON ep.PK_estado_plan = p.FK_estado ORDER BY p.pk_plan DESC LIMIT 100;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_plan'] . "</td>" .
            "<td>" . $row['cliente'] . "</td>" .
            "<td>" . $row['telefono'] . "</td>" .
            "<td> $" . $row['monto'] . "</td>" .
            "<td>" . $row['fecha'] . "</td>" .
            "<td>" . $row['nombre_estado'] . "</td>" .
            "</tr>";
    }
}



