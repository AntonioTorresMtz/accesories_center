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
    $query = "SELECT e.nombre_estado, PK_apartado, producto, precio, tiempo_apartado, nombre_cliente, cantidad_restante, fecha_inicio
    FROM tbl_apartado a
    INNER JOIN cat_estado_apartado e ON e.PK_estado_apartado = a.FK_estado_apartado
    WHERE  a.nombre_cliente LIKE '%$q%'";

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