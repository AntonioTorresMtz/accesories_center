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
    $mysqli = getConnexionRecargas();
    $numero = $mysqli->real_escape_string($_POST['busca']);
    $query = "SELECT 
    r.PK_recarga, 
    COALESCE(tp.tipo, r.FK_tipo_recarga) AS tipo, 
    r.FK_compania,
    r.monto, 
    r.telefono, 
    r.fecha_insercion
    FROM tbl_recargas r
    LEFT JOIN cat_tipo_recarga tp ON tp.PK_tipo_recarga = r.FK_tipo_recarga 
    WHERE r.telefono = '$numero'
    ORDER BY r.PK_recarga DESC
    LIMIT 100;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_recarga'] . "</td>" .
            "<td>" . $row['tipo'] . "</td>" .
            "<td>" . $row['monto'] . "</td>" .
            "<td>" . $row['FK_compania'] . "</td>" .
            "<td>" . $row['telefono'] . "</td>" .
            "<td>" . $row['fecha_insercion'] . "</td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexionRecargas();
    $query = "SELECT 
    r.PK_recarga, 
    COALESCE(tp.tipo, r.FK_tipo_recarga) AS tipo, 
    r.FK_compania,
    r.monto, 
    r.telefono, 
    r.fecha_insercion
    FROM tbl_recargas r
    LEFT JOIN cat_tipo_recarga tp ON tp.PK_tipo_recarga = r.FK_tipo_recarga 
    ORDER BY r.PK_recarga DESC
    LIMIT 100;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_recarga'] . "</td>" .
            "<td>" . $row['tipo'] . "</td>" .
            "<td>" . $row['monto'] . "</td>" .
            "<td>" . $row['FK_compania'] . "</td>" .
            "<td>" . $row['telefono'] . "</td>" .
            "<td>" . $row['fecha_insercion'] . "</td>" .
            "</tr>";
    }
}



