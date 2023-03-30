<?php
session_start();
include '../db.php';
$marca = $_POST["marca"];
//$cantidad = $_POST["cantidad"];
$posicion = $_POST["posicion"];
$muro = $_POST['muro'];
$modelos_arreglo = array();
$modelo = ($_POST['modelo']);


while(true) {
    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
    $modelo1 = current($modelo); //Modelo
    $modelos_arreglo[] = $modelo1;
    // Up! Next Value
    $modelo1 = next( $modelo);
    // Check terminator
    if($modelo1 === false) break;
}

var_dump( $modelos_arreglo);

$contador = 0;
foreach ($modelos_arreglo as $model) {
    $verifica = "SELECT COUNT(*) as number FROM modelo_funda WHERE tipo_modelo = '$model';";
    echo "Modelo:". $model . "<br>"; 
    $resultado_sp = mysqli_query($conn, $verifica);
    $row = mysqli_fetch_assoc($resultado_sp);
    $contador = $contador + $row["number"];    
  }

echo $contador;

if($contador == 0){
    $protector = "INSERT INTO protectores (marca, cantidad, posicion) VALUES ('$marca', '0','$posicion')";

    $resultado = mysqli_query($conn, $protector);
    if(!$resultado){
        echo 'Error mica <br>';
    } else{
        echo 'Exito mica <br>' ;
    }

    $idProtector = "SELECT MAX(id_protector) FROM protectores";
    $resultado = mysqli_query($conn, $idProtector);
    $id;
    while($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['MAX(id_protector)'];
    }

    $cantidad = ($_POST['cantidad']);
    $tipo = ($_POST['tipo']);


    while(true) {
        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
    $cantidad1 = current($cantidad); //Cantidad
    $tipo1 = current ($tipo);

    $sql1 = "INSERT INTO tipo_protector (tipo, cantidad,  id_protector) VALUES ('$tipo1', '$cantidad1', '$id')";

    $sqlRes=$conn->query($sql1); //Consulta para el insert
    if(!$sql1){
        echo 'Error tipo<br>';
    } else{
        echo 'Exito tipo <br>' ;
    }

    // Up! Next Value
    $tipo1 = next( $tipo );
    $cantidad1 = next ( $cantidad);
    // Check terminator
    if($cantidad1 === false || $tipo1 === false) break;
    }


    while(true) {
        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
    $modelo1 = current($modelo); //Modelo
    
    $sql1 = "INSERT INTO modelo_funda (id_protector, tipo_modelo) VALUES ('$id', '$modelo1')";

    $sqlRes=$conn->query($sql1); //Consulta para el insert
    if(!$sql1){
        echo 'Error modelo<br>';
    } else{
        echo 'Exito modelo <br>' ;
    }

    // Up! Next Value
    $modelo1 = next( $modelo);
    // Check terminator
    if($modelo1 === false) break;
    }

    $total = 0;
    $cantidadTotal = "SELECT cantidad FROM tipo_protector WHERE id_protector = '$id'";
    $resultado = mysqli_query($conn, $cantidadTotal);
    while($row = mysqli_fetch_assoc($resultado)) {
        $total = $total + $row['cantidad'];
        echo $total;
    }

    $totalNuevo = "UPDATE protectores SET cantidad='$total' WHERE id_protector = '$id'";
    $resultado = mysqli_query($conn, $totalNuevo);

    if(!$resultado){
        echo 'Error actualizacion<br>';
    } else{
        echo 'Exito actualizacion<br>' ;
    }


    $_SESSION['exito_protector'] = "Protector guardado";
    header("Location: ../protectores.php");
    exit(); 
    }else{
       if(count($modelos_arreglo) == 1){
            $_SESSION['protector_repetido'] = "Protector repetido";
            header("Location: ../protectores.php");
            exit();
            echo "Modelo repetido" . count($modelos_arreglo);
        }else{
            $_SESSION['protectores_repetido'] = "Protector repetido";
            header("Location: ../protectores.php");
            exit();
            echo "Modelos repetido" . count($modelos_arreglo);
        }

    }
?>