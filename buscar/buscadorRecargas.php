<?php


require_once '../conexion.php';
if (!isset ($_POST['busca'])) {
    defecto();
    exit ("No se encontro el valor");

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
    $mysqli = getConnexionRecargas();
    $fecha = $mysqli->real_escape_string($_POST['busca']);
    $query = "SELECT r.PK_recarga, tp.tipo, r.monto, r.telefono, r.fecha FROM tbl_recargas r
    INNER JOIN cat_tipo_recarga tp ON tp.PK_tipo_recarga = r.FK_tipo_recarga
    WHERE date(r.fecha) = '$fecha'
    ORDER BY PK_recarga DESC;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_recarga'] . "</td>" .
            "<td>" . $row['tipo'] . "</td>" .
            "<td>" . $row['monto'] . "</td>" .
            "<td>" . $row['telefono'] . "</td>" .
            "<td>" . $row['fecha'] . "</td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexionRecargas();
    $query = "SELECT r.PK_recarga, tp.tipo, r.monto, r.telefono, r.fecha FROM tbl_recargas r
    INNER JOIN cat_tipo_recarga tp ON tp.PK_tipo_recarga = r.FK_tipo_recarga
    ORDER BY PK_recarga DESC;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_recarga'] . "</td>" .
            "<td>" . $row['tipo'] . "</td>" .
            "<td>" . $row['monto'] . "</td>" .
            "<td>" . $row['telefono'] . "</td>" .
            "<td>" . $row['fecha'] . "</td>" .
            "</tr>";
    }
}



