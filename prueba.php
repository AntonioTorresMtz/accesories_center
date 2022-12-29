<?php
include 'db.php';
$evita = "SELECT * FROM nombre WHERE nombre_modelo = 95";
$resultado1 = mysqli_query($conn, $evita);
if( $resultado1 ){
    if( mysqli_num_rows( $resultado1) > 0){
      while($fila = mysqli_fetch_array( $resultado1) ){
        echo $fila['nombre_modelo'];
      }
    } else{
        echo "Modelo no disponible";
    }
}
?>