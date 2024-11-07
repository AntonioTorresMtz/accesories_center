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
    $query = "SELECT CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
c.imei1, vc.fecha_venta, DATEDIFF(CURDATE(), date(vc.fecha_venta)) AS dias,
vc.precio, vc.descuento, (vc.precio - vc.descuento) AS total, vc.PK_venta
FROM venta_celular vc
INNER JOIN celular c ON c.id_celular = vc.FK_celular
INNER JOIN marca m ON m.id_marca = c.FK_marca
    WHERE  CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') LIKE '%$q%'
    ORDER BY vc.fecha_venta DESC";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['PK_venta'] . "</td>" .
            "<td>" . $row['modelo'] . "</td>" .
            "<td>" . $row['imei1'] . "</td>" .
            "<td>" . $row['fecha_venta'] . "</td>" .
            "<td>" . $row['dias'] . "</td>" .
            "<td>" . $row['precio'] . "</td>" .
            "<td>" . $row['descuento'] . "</td>" .
            "<td>" . $row['total'] . "</td>" .
            "<td> <button class='btn btn-primary btn-reimprimir' id='" . $row['PK_venta'] . "' onclick='reimprimir(" . $row['PK_venta'] . ")'> Reimprimir </button> </td>";
    }
}

function defecto()
{
    $mysqli = getConnexion();
    $query = "SELECT CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
c.imei1, vc.fecha_venta, DATEDIFF(CURDATE(), date(vc.fecha_venta)) AS dias,
vc.precio, vc.descuento, (vc.precio - vc.descuento) AS total, vc.PK_venta
FROM venta_celular vc
INNER JOIN celular c ON c.id_celular = vc.FK_celular
INNER JOIN marca m ON m.id_marca = c.FK_marca
ORDER BY vc.fecha_venta DESC";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['PK_venta'] . "</td>" .
            "<td>" . $row['modelo'] . "</td>" .
            "<td>" . $row['imei1'] . "</td>" .
            "<td>" . $row['fecha_venta'] . "</td>" .
            "<td>" . $row['dias'] . "</td>" .
            "<td>" . $row['precio'] . "</td>" .
            "<td>" . $row['descuento'] . "</td>" .
            "<td>" . $row['total'] . "</td>" .
            "<td> <button class='btn btn-primary btn-reimprimir' id='" . $row['PK_venta'] . "' onclick='reimprimir(" . $row['PK_venta'] . ")'> Reimprimir </button> </td>";
    }
}
