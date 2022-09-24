<?php
include '../db.php';
$model = $_POST['model'];

$patron = "/^([0-9]+)(-)([0-9]+)$/";
//$patron = "/^([0-9]+)(-)([a-zA-Z0-9\'.\s]{1,30})$/";

$encontrado = preg_match($patron, $model, $coincidencias, PREG_OFFSET_CAPTURE);;
$id = 0;

if ($encontrado) {
    $id= $coincidencias[1][0] ."<br>";
}


$query = "SELECT b.nombre, a.id_tipo AS tipo , b.id_nombreTipo FROM nombre_tipo_protector b
INNER JOIN tipo_protector a
ON a.tipo = b.id_nombreTipo
WHERE a.id_protector = '$id'";

    $resultado = mysqli_query($conn, $query);

    $html = "<option value='0'>--Selecciona Estilo de Funda--</option>";
    while($row = $resultado->fetch_assoc()){
        $valor = $row["tipo"];
        $html = $html . "<option value='".$valor ."'>".$row["nombre"] . "</option>"; 
    }
    echo $html;
  
?>