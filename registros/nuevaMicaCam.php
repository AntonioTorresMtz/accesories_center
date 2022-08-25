<?php
session_start();
include '../db.php';
$marca = $_POST["marca"];
$cantidad = $_POST["cantidad"];
$posicion = $_POST["posicion"];


$mica = "INSERT INTO micas_camara (marca, cantidad, posicion) VALUES ('$marca', '$cantidad','$posicion')";

$resultado = mysqli_query($conn, $mica);
if(!$resultado){
    echo 'Error mica <br>';
} else{
    echo 'Exito mica <br>' ;
}

$modelo = ($_POST['modelo']);

$idMica = "SELECT MAX(id_micaCamara) FROM micas_camara";
$resultado = mysqli_query($conn, $idMica);
$id;
while($row = mysqli_fetch_assoc($resultado)) {
     $id = $row['MAX(id_micaCamara)'];
}

while(true) {
    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
   $modelo1 = current($modelo); //Modelo
   
   $sql1 = "INSERT INTO nombre_micacamara (modelo, id_micaCamara) VALUES ('$modelo1', '$id')";

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


$_SESSION['exito_micaCam'] = "Mica guardada";
header("Location: ../micasCamara.php");
exit(); 


?>