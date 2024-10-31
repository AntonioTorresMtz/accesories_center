<?php
require_once '../conexion.php';

if (isset($_POST['busca'])) {
    buscar();
}

function buscar()
{
    $mysqli = getConnexion();
    $q = $mysqli->real_escape_string($_POST['busca']);
    $query = "SELECT CONCAT(m.marca, ' ', c.modelo, ' ', c.almacenamiento, 'gb ', c.red, 'G + ', c.ram, 'gb RAM') as modelo,
    c.id_celular 
    FROM celular c
    INNER JOIN marca m ON m.id_marca = c.FK_marca
    WHERE c.id_celular = '$q' OR c.imei1 = '$q' OR c.imei2 = '$q' AND estado_venta = 1";

    $res = $mysqli->query($query);

    // Verificar si se encontraron resultados
    if ($res->num_rows > 0) {
        $resultados = [];
        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $resultados[] = $row;
        }

        // Enviar resultados con 'resultado' como true
        echo json_encode([
            'resultado' => true,
            'data' => $resultados
        ]);
    } else {
        // No se encontraron resultados, retornar 'resultado' como false y un mensaje
        echo json_encode([
            'resultado' => false,
            'mensaje' => 'No se encontro ningún telefono.'
        ]);
    }
}
