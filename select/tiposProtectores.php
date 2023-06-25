<?php
include '../db.php';
$id_modelo = $_POST['id_modelo'];
$opcion = $_POST['opc'];

$query = "SELECT p.id_tipo, p.tipo, p.cantidad, n.nombre FROM  tipo_protector p 
INNER JOIN nombre_tipo_protector n ON n.id_nombreTipo = p.tipo
WHERE id_protector = '$id_modelo';";

$resultado = mysqli_query($conn, $query);
$cont_filas = 0;
$html = "<div class='row text-center mt-1'>
            <div class='col-6'>Tipo:</div>
            <div class='col-6'>Cantidad:</div>
        </div>";
while ($row = mysqli_fetch_assoc($resultado)) {
    $nombre = $row['nombre'];
    $id_tipo = $row['tipo'];
    $cantidad = $row['cantidad'];

    // Generar el input dinámico                
    $html = $html . '<div class="row mb-2"><div class="col-6"><input readonly type="text" name="nombre[]" value="' . $nombre . '" class="form-control"> </div>';
    if ($opcion == 1) {
        $html = $html . '<input hidden type="text" name="tipos[]" value="' . $id_tipo . '" class="form-control"> ';
        $html = $html . '<div class="col-6"><input type="number" name="cantidades1[]" value="' . $cantidad . '" class="form-control"> </div> </div>';
    } else {
        $html = $html . '<div class="col-6"><input type="number" name="cantidades2[]" value="' . $cantidad . '" class="form-control"> </div> </div>';
    }

}

echo $html;

?>