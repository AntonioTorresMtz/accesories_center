<?php
session_start();
include 'db.php';
$marca = $_POST["marca"];
$cantidad = $_POST["cantidad"];
$ancho = $_POST["ancho"];
$largo = $_POST["largo"];
$posicion = $_POST["posicion"];
$modelo = ($_POST['modelo']);

while(true){
    $modelo1 = current($modelo); //Modelo
    $modelos_arreglo[] = $modelo1;
    // Up! Next Value
    $modelo1 = next( $modelo);
    // Check terminator
    if($modelo1 === false) break; 
}

$contador = 0;
foreach ($modelos_arreglo as $model) {
    $verifica = "SELECT COUNT(*) as number FROM nombre WHERE nombre_modelo = '$model';";
    echo "Modelo:". $model . "<br>"; 
    $resultado_sp = mysqli_query($conn, $verifica);
    $row = mysqli_fetch_assoc($resultado_sp);
    $contador = $contador + $row["number"];    
  }

if($contador == 0){
    $mica = "INSERT INTO micas9d (marca, cantidad, ancho, largo, posicion) VALUES ('$marca', '$cantidad',
'$ancho', '$largo', '$posicion')";

$resultado = mysqli_query($conn, $mica);
if(!$resultado){
    echo 'Error mica <br>';
} else{
    echo 'Exito mica <br>' ;    

    $idMica = "SELECT MAX(id_mica9d) FROM micas9d";
    $resultado = mysqli_query($conn, $idMica);
    $id;
    while($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['MAX(id_mica9d)'];
    }

    $modelos_name = [];
    
    while(true) {
        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
    
    $modelo1 = current($modelo); //Modelo
    $evita = "SELECT * FROM nombre WHERE nombre_modelo = '$modelo1'";
    $resultado1 = mysqli_query($conn, $evita);
    if( $resultado1){
        if( mysqli_num_rows( $resultado1) > 0){
            $_SESSION['error_duplicado'] = "Mica guardada";
            header("Location: micas9d.php");
            break;
        } else{
            $sql1 = "INSERT INTO nombre (nombre_modelo, id_mica) VALUES ('$modelo1', '$id')";
            $sqlRes=$conn->query($sql1); //Consulta para el insert
            if(!$sql1){
                echo 'Error modelo<br>';
            } else{
                echo 'Exito modelo <br>' ;
            }
        }
    }
    
    // Up! Next Value
    $modelo1 = next( $modelo );
    // Check terminator
    if($modelo1 === false) break;
    }

    $_SESSION['exito_mica'] = "Mica guardada";
    header("Location: micas9d.php");
    exit(); 

}

} else{
    if(count($modelos_arreglo) == 1){
        $_SESSION['modelo_repetido'] = "Protector repetido";
        header("Location: micas9d.php");
        exit();
        echo "Modelo repetido" . count($modelos_arreglo);
    }else{
        $_SESSION['modelos_repetido'] = "Protector repetido";
        header("Location: micas9d.php");
        exit();
        echo "Modelos repetido" . count($modelos_arreglo);
    }
}


?>