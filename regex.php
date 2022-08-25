<?php
$patron = "/^([0-9]+)(-)([a-zA-Z0-9\'.\s]{3,20})$/";
$cadena = "1-P30 L.ite''";
$encontrado = preg_match($patron, $cadena, $coincidencias, PREG_OFFSET_CAPTURE);;
$id_modelo = 0;
$nombre_modelo = 0;
if ($encontrado) {
    $id_modelo = $coincidencias[1][0] ."<br>";
    $nombre_modelo = $coincidencias[3][0];
    echo "ID:" . $id_modelo;
    echo "Modelo:" . $nombre_modelo."<br>";
    echo "Encontrado:\n";

    

} else {
    print "<p>No se han encontrado coincidencias.</p>\n";
}
echo $cadena;


?>