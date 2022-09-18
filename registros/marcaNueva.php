<?php
include('../db.php');
session_start();

$marca = $_POST["nombre"];

$cont = 0;
$marca_tabla = "";
$query = "SELECT marca FROM marca";

$res = $conn->query($query);

while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $marca_tabla = $row['marca'];
    if(strtolower($marca) == strtolower($marca_tabla)){
        $cont = $cont + 1;
        break;
    }
}

if($cont > 0){
    $_SESSION['error_nuevaMarca'] = "Mica guardada";
    header("Location: ../nuevaMarca.php");
    exit();  
} else{
    $consulta = "INSERT INTO `marca` (`id_marca`, `marca`) VALUES (NULL, '$marca');";

    $resultado = mysqli_query($conn, $consulta);

    if(!$resultado){
        echo 'Error en la actualacion <br>';
        printf("Errormessage: %s\n", $conn->error);
    } else{
        $_SESSION['exito_nuevaMarca'] = "Mica guardada";
        header("Location: ../nuevaMarca.php");
        exit(); 
    }
}

mysqli_close($conn);

?>