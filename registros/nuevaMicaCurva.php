<?php
session_start();
include '../db.php';
$marca = $_POST["marca"];
$cantidad = $_POST["cantidad"];
$posicion = $_POST["posicion"];
$modelos_arreglo = array();
$modelo = ($_POST['modelo']);

while (true) {
    $modelo1 = current($modelo); //Modelo
    $modelos_arreglo[] = $modelo1;
    // Up! Next Value
    $modelo1 = next($modelo);
    // Check terminator
    if ($modelo1 === false)
        break;
}

var_dump($modelos_arreglo);

$contador = 0;
foreach ($modelos_arreglo as $model) {
    $verifica = "SELECT COUNT(*) as number FROM nombre_micaCurva WHERE nombre_modelo = '$model';";
    echo "Modelo:" . $model . "<br>";
    $resultado_sp = mysqli_query($conn, $verifica);
    $row = mysqli_fetch_assoc($resultado_sp);
    $contador = $contador + $row["number"];
}

echo $contador;

if ($contador == 0) {
    $mica = "INSERT INTO micascurva (marca, cantidad, posicion) VALUES ('$marca', '$cantidad','$posicion')";

    $resultado = mysqli_query($conn, $mica);
    if (!$resultado) {
        echo 'Error mica <br>';
    } else {
        echo 'Exito mica <br>';
    }

    $modelo = ($_POST['modelo']);

    $idMica = "SELECT MAX(id_micaCurva) FROM micascurva";
    $resultado = mysqli_query($conn, $idMica);
    $id;
    while ($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['MAX(id_micaCurva)'];
    }

    foreach ($modelos_arreglo as $model) {
        $sql1 = "INSERT INTO nombre_micacurva (nombre_modelo, id_micaCurva) VALUES ('$model', '$id')";
        echo $model . "<br>";
        $sqlRes = $conn->query($sql1); //Consulta para el insert
        if (!$sql1) {
            echo 'Error modelo<br>';
        } else {
            echo 'Exito modelo <br>';
        }
    }

    $_SESSION['exito_micaCurva'] = "Mica guardada";
    header("Location: ../micasCurva.php");
    exit();
} else {
    if (count($modelos_arreglo) == 1) {
        $_SESSION['modelo_repetido'] = "Protector repetido";
        header("Location: ../micasCurva.php");
        exit();
        //echo "Modelo repetido" . count($modelos_arreglo);
    } else {
        $_SESSION['modelos_repetido'] = "Protector repetido";
        header("Location: ../micasCurva.php");
        exit();
        //echo "Modelos repetido" . count($modelos_arreglo);
    }
}




?>