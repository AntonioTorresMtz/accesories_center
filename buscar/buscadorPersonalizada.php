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
    $numero = $mysqli->real_escape_string($_POST['busca']);
    $query = " SELECT v.id_venta, v.cantidad, m.marca, mo.nombre, v.fecha FROM ventas v 
    INNER JOIN marca m ON m.id_marca = v.marca
    INNER JOIN modelos mo ON mo.id_modelo = v.nombre_modelo
    WHERE id_producto = 5 AND id_tipo = 43
    and mo.nombre = '$numero'
    ORDER BY id_venta DESC";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['id_venta'] . "</td>" .
            "<td>" . $row['marca'] . "</td>" .
            "<td>" . $row['nombre'] . "</td>" .
            "<td>" . $row['cantidad'] . "</td>" .
            "<td>" . $row['fecha'] . "</td>" .
            "</tr>";
    }
}

function defecto()
{
    $mysqli = getConnexion();
    $query = "SELECT v.id_venta, v.cantidad, m.marca, mo.nombre, v.fecha FROM ventas v 
    INNER JOIN marca m ON m.id_marca = v.marca
    INNER JOIN modelos mo ON mo.id_modelo = v.nombre_modelo
    WHERE id_producto = 5 AND id_tipo = 43
    ORDER BY id_venta DESC;";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['id_venta'] . "</td>" .
            "<td>" . $row['marca'] . "</td>" .
            "<td>" . $row['nombre'] . "</td>" .
            "<td>" . $row['cantidad'] . "</td>" .
            "<td>" . $row['fecha'] . "</td>" .
            "</tr>";
    }
}



