<?php
if(!isset($_POST['busca']) and !isset($_POST['largo'])){
    exit ("No se encontro el valor");
}

require_once 'conexion.php';

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

    $query="SELECT a.modelo, b.ancho, b.largo, c.nombre FROM nombre_mica9h a INNER JOIN micas9h b ON b.id_mica9h = a.id_mica9h INNER JOIN posicion c ON c.id_posicion = b.posicion
    WHERE b.ancho <= $ancho and b.largo <= $largo";

    $res = $mysqli->query($query);
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "<p>". $row['modelo']. " |  " . $row['ancho']. " x " .$row['largo'] ." | ". $row['nombre']."</p>";
    }
}

buscar($ancho, $largo);

?>

