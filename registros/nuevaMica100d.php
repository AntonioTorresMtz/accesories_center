<?php
session_start();
include '../db.php';
$marca = $_POST["marca"];
$cantidad = $_POST["cantidad"];
$posicion = $_POST["posicion"];


$mica = "INSERT INTO micas100d (marca, cantidad, posicion) VALUES ('$marca', '$cantidad','$posicion')";

$resultado = mysqli_query($conn, $mica);
if(!$resultado){
    echo 'Error mica <br>';
} else{
    echo 'Exito mica <br>' ;
}

$modelo = ($_POST['modelo']);

$idMica = "SELECT MAX(id_mica100d) FROM micas100d";
$resultado = mysqli_query($conn, $idMica);
$id;
while($row = mysqli_fetch_assoc($resultado)) {
     $id = $row['MAX(id_mica100d)'];
}

while(true) {
    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
   $modelo1 = current($modelo); //Modelo
   
   $sql1 = "INSERT INTO nombre_mica100d (modelo, id_mica100d) VALUES ('$modelo1', '$id')";

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


$_SESSION['exito_mica100d'] = "Mica guardada";
header("Location: ../micasPrivacidad.php");
exit(); 


?>