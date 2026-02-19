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
    $query = "SELECT r.PK_reparacion, CONCAT(servicio, ' ', ma.marca, ' ', m.nombre) as servicio, 
    r.nombre_cliente, r.telefono_contacto, r.presupuesto, r.abono, r.contrasena_telefono, r.fecha_recepcion
    FROM tbl_reparacion r
    INNER JOIN modelos m ON m.id_modelo = r.FK_modelo
    INNER JOIN marca ma ON ma.id_marca = r.FK_marca
    WHERE  CONCAT(ma.marca, ' ', m.nombre, ' ',  r.nombre_cliente) LIKE '%$q%'";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['servicio'] . "</td>" .
            "<td>" . $row['nombre_cliente'] . "</td>" .
            "<td>" . $row['telefono_contacto'] . "</td>" .
            "<td>" . $row['presupuesto'] . "</td>" .
            "<td>" . $row['abono'] . "</td>" .
            "<td>" . $row['contrasena_telefono'] . "</td>" .
            "<td>" . $row['fecha_recepcion'] . "</td>" .
            "<td><a href='seguimientoGarantia.php?id=" . $row['PK_reparacion'] . "'> Detalles </a></td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexion();
    $query = "SELECT r.PK_reparacion, CONCAT(servicio, ' ', ma.marca, ' ', m.nombre) as servicio, 
    r.nombre_cliente, r.telefono_contacto, r.presupuesto, r.abono, r.contrasena_telefono, r.fecha_recepcion
    FROM tbl_reparacion r
    INNER JOIN modelos m ON m.id_modelo = r.FK_modelo
    INNER JOIN marca ma ON ma.id_marca = r.FK_marca
    ORDER BY r.PK_reparacion DESC";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['servicio'] . "</td>" .
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
