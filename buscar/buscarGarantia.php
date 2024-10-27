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
    $query = "SELECT tg.PK_ticket_garantia, CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
    tg.nombre_dueno, tg.telefono_dueno, vc.fecha_venta, tg.fecha_recepcion, tg.ticket_compra FROM tbl_ticket_garantia tg
    INNER JOIN venta_celular vc ON vc.PK_venta = tg.FK_venta_celular
    INNER JOIN celular c ON c.id_celular = vc.FK_celular
    INNER JOIN marca m  ON c.FK_marca = m.id_marca
    WHERE  CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb', ' ', tg.nombre_dueno) LIKE '%$q%'";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['modelo'] . "</td>" .
            "<td>" . $row['nombre_dueno'] . "</td>" .
            "<td>" . $row['telefono_dueno'] . "</td>" .
            "<td>" . $row['fecha_venta'] . "</td>" .
            "<td>" . $row['fecha_recepcion'] . "</td>" .
            "<td>" . $row['ticket_compra'] . "</td>" .
            "<td><a href='seguimientoGarantia.php?id=" . $row['PK_ticket_garantia'] . "'> Detalles </a></td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexion();
    $query = "SELECT tg.PK_ticket_garantia, CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
tg.nombre_dueno, tg.telefono_dueno, vc.fecha_venta, tg.fecha_recepcion, tg.ticket_compra FROM tbl_ticket_garantia tg
INNER JOIN venta_celular vc ON vc.PK_venta = tg.FK_venta_celular
INNER JOIN celular c ON c.id_celular = vc.FK_celular
INNER JOIN marca m  ON c.FK_marca = m.id_marca;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['modelo'] . "</td>" .
            "<td>" . $row['nombre_dueno'] . "</td>" .
            "<td>" . $row['telefono_dueno'] . "</td>" .
            "<td>" . $row['fecha_venta'] . "</td>" .
            "<td>" . $row['fecha_recepcion'] . "</td>" .
            "<td>" . $row['ticket_compra'] . "</td>" .
            "<td><a href='seguimientoGarantia.php?id=" . $row['PK_ticket_garantia'] . "'> Detalles </a></td>" .
            "</tr>";
    }
}
