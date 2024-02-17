<?php


require_once '../conexion.php';
$producto = intval($_POST["producto"]);
$maximo = intval($_POST["maximo"]);

switch ($producto) {
    case 1:
        buscarMica9h($maximo);
        break;
    case 2:
        buscarMica9d($maximo);
        break;
    case 3:
        buscarMica100d($maximo);
        break;
}
function buscarMica9h($maximo)
{
    $mysqli = getConnexion();
    $query = "SELECT GROUP_CONCAT(DISTINCT CONCAT(ma.marca, ' ', mo.nombre) SEPARATOR ', ') AS modelos, m.cantidad 
    FROM micas9h m
    INNER JOIN nombre_mica9h nom ON m.id_mica9h = nom.id_mica9h
    INNER JOIN modelos mo ON mo.id_modelo = nom.nombre_modelo
    INNER JOIN marca ma ON ma.id_marca = mo.marca
    WHERE m.cantidad <= '$maximo'
    GROUP BY nom.id_mica9h
    ORDER BY ma.marca, mo.nombre";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['modelos'] . "</td>" .
            "<td>" . $row['cantidad'] . "</td>" .
            "</tr>";
    }
}

function buscarMica9d($maximo)
{
    $mysqli = getConnexion();
    $query = "SELECT GROUP_CONCAT(DISTINCT CONCAT(ma.marca, ' ', mo.nombre) SEPARATOR ', ') AS modelos, CONCAT('Muro ', p.muro, ' ', p.nombre),
    m.cantidad 
        FROM micas9d m
        INNER JOIN nombre nom ON m.id_mica9d = nom.id_mica
        INNER JOIN modelos mo ON mo.id_modelo = nom.nombre_modelo
        INNER JOIN marca ma ON ma.id_marca = mo.marca
        INNER JOIN posicion p ON m.posicion = p.id_posicion
        GROUP BY nom.id_mica
        ORDER BY p.nombre, ma.marca, mo.nombre";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['modelos'] . "</td>" .
            "<td>" . $row['cantidad'] . "</td>" .
            "</tr>";
    }
}

function buscarMica100d($maximo)
{
    $mysqli = getConnexion();
    $query = "SELECT GROUP_CONCAT(DISTINCT CONCAT(ma.marca, ' ', mo.nombre) SEPARATOR ', ') AS modelos, m.cantidad 
    FROM micas100d m
    INNER JOIN nombre_mica100d nom ON m.id_mica100d = nom.id_mica100d
    INNER JOIN modelos mo ON mo.id_modelo = nom.nombre_modelo
    INNER JOIN marca ma ON ma.id_marca = mo.marca
    WHERE m.cantidad <= '$maximo'
    GROUP BY nom.id_mica100d
    ORDER BY ma.marca, mo.nombre";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['modelos'] . "</td>" .
            "<td>" . $row['cantidad'] . "</td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexion();
    $query = "SELECT e.nombre_estado, PK_apartado, producto, precio, tiempo_apartado, nombre_cliente, cantidad_restante, fecha_inicio
    FROM tbl_apartado a
    INNER JOIN cat_estado_apartado e ON e.PK_estado_apartado = a.FK_estado_apartado;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /*  if ($row['estado'] == 0) {
              $condicion = 'Usado';
          } else {
              $condicion = 'Nuevo';
          }*/
        echo "<tr> <td>" . $row['nombre_estado'] . "</td>" .
            "<td>" . $row['producto'] . "</td>" .
            "<td>" . $row['precio'] . "</td>" .
            "<td>" . $row['tiempo_apartado'] . "</td>" .
            "<td>" . $row['nombre_cliente'] . "</td>" .
            "<td>" . $row['cantidad_restante'] . "</td>" .
            "<td>" . $row['fecha_inicio'] . "</td>" .
            "<td><a href='agregarAbono.php?id=" . $row['PK_apartado'] . "'> Abonar </a></td>" .
            "</tr>";
    }
}
?>