<?php
session_start();
include '../db.php';
$marca = $_POST["marca"];
$cantidad = $_POST["cantidad"];
$ancho = $_POST["ancho"];
$largo = $_POST["largo"];
$posicion = $_POST["posicion"];
$camara = $_POST["camara"];
$boton = $_POST["boton"];

$mica = "INSERT INTO micas9h (marca, cantidad, ancho, largo, camara, posicion, boton) VALUES ('$marca', '$cantidad',
'$ancho', '$largo', '$camara', '$posicion', '$boton')";

$resultado = mysqli_query($conn, $mica);
if(!$resultado){
    echo 'Error mica <br>';
} else{
    echo 'Exito mica <br>' ;
    $modelo = ($_POST['modelo']);

    $idMica = "SELECT MAX(id_mica9h) FROM micas9h";
    $resultado = mysqli_query($conn, $idMica);
    $id;
    while($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['MAX(id_mica9h)'];
    }

    while(true) {
        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
    $modelo1 = current($modelo); //Modelo
    
    $sql1 = "INSERT INTO nombre_mica9h (nombre_modelo, id_mica9h) VALUES ('$modelo1', '$id')";

    $sqlRes=$conn->query($sql1); //Consulta para el insert
    if(!$sql1){
        echo 'Error modelo<br>';
    } else{
        echo 'Exito modelo <br>' ;
    }

    // Up! Next Value
    $modelo1 = next( $modelo );
    // Check terminator
    if($modelo1 === false) break;
    }

    $_SESSION['exito_mica9h'] = "Mica guardada";
    header("Location:../micas9h.php");
    exit(); 

}

?>