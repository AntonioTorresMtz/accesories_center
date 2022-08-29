<?php
include('../db.php');
session_start();

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

if(isset($_POST["descuento"])){
    $descuento = $_POST['descuento'];
} else{
    $descuento = 0;
}


$patron = "/^([0-9]+)(-)([0-9]+)$/";
//$patron = "/^([0-9]+)(-)([a-zA-Z0-9\'.\s]{1,30})$/";

$encontrado = preg_match($patron, $modelo, $coincidencias, PREG_OFFSET_CAPTURE);;
$id_modelo = 0;
$nombre_modelo = 0;
if ($encontrado) {
    $id_modelo = $coincidencias[1][0] ."<br>";
    $nombre_modelo = $coincidencias[3][0];
    echo "ID:" . $id_modelo;
    echo "Modelo:" . $nombre_modelo."<br>";
    echo "Encontrado:\n";

    $query = "INSERT INTO `ventas` (`id_venta`, `id_producto`, `marca`, `fecha`, `id_tipo`, `cantidad`,
     `precio`, `descuento`, `nombre_modelo`)
      VALUES (NULL, '1', '$marca', current_timestamp(), NULL, '$cantidad', '$precio', '$descuento', '$nombre_modelo')";

    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        echo 'Error mica <br>';
        printf("Errormessage: %s\n", $conn->error);
    } else{
        echo 'Exito mica <br>' ;
        $query2 = "UPDATE `micas9h` SET `cantidad` = cantidad -'$cantidad' WHERE `micas9h`.`id_mica9h` = '$id_modelo'";
        $resultado2 = mysqli_query($conn, $query2);
        if(!$resultado2){
            echo 'Error actualizar cantidad <br>';
        } else{
            $_SESSION['exito_ventaMica9h'] = "Mica guardada";
            header("Location: ../ventaMenu_mica9h.php");
            exit(); 
        }
        
    } 
} else {
    print "<p>No se han encontrado coincidencias.</p>\n";
    $_SESSION['exito_ventaMica9h'] = "Mica guardada";
    header("Location: ../ventaMenu_mica9h.php");
    exit(); 
}
echo $modelo;





?>