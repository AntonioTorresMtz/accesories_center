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
    $query = "SELECT PK_servicio, producto, referencia, cantidad, fecha_plataforma
    FROM tbl_servicios
    WHERE referencia = '$numero'
    ORDER BY PK_servicio DESC LIMIT 100;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_recarga'] . "</td>" .
            "<td>" . $row['tipo'] . "</td>" .
            "<td>" . $row['monto'] . "</td>" .
            "<td>" . $row['FK_compania'] . "</td>" .
            "<td>" . $row['telefono'] . "</td>" .
            "<td>" . $row['fecha_insercion'] . "</td>" .
            "<td> <button class='btn btn-primary btn-reimprimir' id='" . $row['PK_recarga'] . "' onclick='reimprimir(" . $row['PK_recarga'] . ")'> Reimprimir </button> </td>
            <tr>";
    }
}

function defecto()
{
    $mysqli = getConnexionRecargas();
    $query = "SELECT PK_servicio, producto, referencia, cantidad, fecha_plataforma
    FROM tbl_servicios ORDER BY PK_servicio DESC LIMIT 100;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['PK_servicio'] . "</td>" .
            "<td>" . $row['producto'] . "</td>" .
            "<td>" . $row['referencia'] . "</td>" .
            "<td>" . $row['cantidad'] . "</td>" .
            "<td>" . $row['fecha_plataforma'] . "</td>" .            
            "<td> <button class='btn btn-primary btn-reimprimir' id='" . $row['PK_servicio'] . "' onclick='reimprimir(" . $row['PK_recarga'] . ")'> Reimprimir </button> </td>
            <tr>";
    }
}



