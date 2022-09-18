
<?php
if(!isset($_POST['busca']) and !isset($_POST['largo'])){
    exit ("No se encontro el valor");
}

require_once '../conexion.php';

$patron = "/^([0-9]+.[0-9]*)(x|X)([0-9]+.[0-9]*)$/";
$encontrado = preg_match($patron, $_POST['busca'], $coincidencias, PREG_OFFSET_CAPTURE);;
$largo = 0;
$ancho = 0;
if ($encontrado) {
    $ancho = $coincidencias[1][0];
    $largo = $coincidencias[3][0];
    echo $ancho;
    
} else {
    print "<p>No se han encontrado coincidencias.</p>\n";
}



function buscar($ancho, $largo){
    $mysqli = getConnexion();
    $q = $mysqli -> real_escape_string($_POST['busca']);

    $query="SELECT m.nombre as model, ma.marca, b.ancho, b.largo, b.boton, b.camara, c.nombre FROM nombre_mica9h a
    INNER JOIN micas9h b ON b.id_mica9h = a.id_mica9h
    INNER JOIN posicion c ON c.id_posicion = b.posicion
    INNER JOIN modelos m ON m.id_modelo = a.nombre_modelo
    INNER JOIN marca ma ON ma.id_marca = b.marca
    WHERE b.ancho <= $ancho and b.largo <= $largo ORDER BY b.ancho DESC";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr> <td>" . $row['marca']. "</td>".
        "<td>" . $row['model']. "</td>".
        "<td>" . $row['ancho']. "</td>".
        "<td>" . $row['largo']. "</td>".
        "<td>" . $row['camara']. "</td>".
        "<td>" . $row['boton']. "</td>".
        "<td>" . $row['nombre']. "</td>".
        "</tr>";
    }
}

buscar($ancho, $largo);

?>


