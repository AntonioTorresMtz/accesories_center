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
    $q = $mysqli->real_escape_string($_POST['busca']);
    $query = "SELECT r.PK_reparacion, r.servicio, ma.marca as marcas, m.nombre as nombre_modelo, r.modelo_nuevo as modelo_nuevo,
    r.nombre_cliente, r.telefono_contacto, r.presupuesto, r.abono, r.contrasena_telefono, r.fecha_recepcion
    FROM tbl_reparacion r
    LEFT JOIN modelos m ON m.id_modelo = r.FK_modelo
    LEFT JOIN marca ma ON ma.id_marca = r.FK_marca
    WHERE  r.nombre_cliente LIKE '%$q%'
    ORDER BY r.PK_reparacion DESC";

   $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        $servicio = $row['servicio'] . " " .  $row['marcas'] .  " " . $row['nombre_modelo'] . $row['modelo_nuevo'];

        echo "<tr> <td>" . $servicio . "</td>" .
            "<td>" . $row['nombre_cliente'] . "</td>" .
            "<td>" . $row['telefono_contacto'] . "</td>" .
            "<td>" . $row['presupuesto'] . "</td>" .
            "<td>" . $row['abono'] . "</td>" .
            "<td>" . $row['contrasena_telefono'] . "</td>" .
            "<td>" . $row['fecha_recepcion'] . "</td>" .
            "<td><a href='reparacionAbono.php?id=" . $row['PK_reparacion'] . "'> Detalles </a></td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexion();
    $query = "SELECT r.PK_reparacion, r.servicio, ma.marca as marcas, m.nombre as nombre_modelo, r.modelo_nuevo as modelo_nuevo,
    r.nombre_cliente, r.telefono_contacto, r.presupuesto, r.abono, r.contrasena_telefono, r.fecha_recepcion
    FROM tbl_reparacion r
    LEFT JOIN modelos m ON m.id_modelo = r.FK_modelo
    LEFT JOIN marca ma ON ma.id_marca = r.FK_marca
    ORDER BY r.PK_reparacion DESC";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        $servicio = $row['servicio'] . " " .  $row['marcas'] .  " " . $row['nombre_modelo'] . $row['modelo_nuevo'];

        echo "<tr> <td>" . $servicio . "</td>" .
            "<td>" . $row['nombre_cliente'] . "</td>" .
            "<td>" . $row['telefono_contacto'] . "</td>" .
            "<td>" . $row['presupuesto'] . "</td>" .
            "<td>" . $row['abono'] . "</td>" .
            "<td>" . $row['contrasena_telefono'] . "</td>" .
            "<td>" . $row['fecha_recepcion'] . "</td>" .
            "<td><a href='reparacionAbono.php?id=" . $row['PK_reparacion'] . "'> Detalles </a></td>" .
            "</tr>";
    }
}
