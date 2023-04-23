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
    $verifica = "SELECT COUNT(*) as number FROM nombre_micaCamara WHERE modelo = '$model';";
    echo "Modelo:" . $model . "<br>";
    $resultado_sp = mysqli_query($conn, $verifica);
    $row = mysqli_fetch_assoc($resultado_sp);
    $contador = $contador + $row["number"];
}

echo $contador;

if ($contador == 0) {
    $mica = "INSERT INTO micas_camara (marca, cantidad, posicion) VALUES ('$marca', '$cantidad','$posicion')";

    $resultado = mysqli_query($conn, $mica);
    if (!$resultado) {
        echo 'Error mica <br>';
    } else {
        echo 'Exito mica <br>';
        $modelo = ($_POST['modelo']);

        $idMica = "SELECT MAX(id_micaCamara) FROM micas_camara";
        $resultado = mysqli_query($conn, $idMica);
        $id;
        while ($row = mysqli_fetch_assoc($resultado)) {
            $id = $row['MAX(id_micaCamara)'];
        }

        foreach ($modelos_arreglo as $model) {
            $sql1 = "INSERT INTO nombre_micacamara (modelo, id_micaCamara) VALUES ('$model', '$id')";
            echo $model . "<br>";
            $sqlRes = $conn->query($sql1); //Consulta para el insert
            if (!$sql1) {
                echo 'Error modelo<br>';
            } else {
                echo 'Exito modelo <br>';
            }
        }

        $_SESSION['exito_micaCam'] = "Mica guardada";
        header("Location: ../micasCamara.php");
        exit();
    }
} else {
    if (count($modelos_arreglo) == 1) {
        $_SESSION['modelo_repetido'] = "Protector repetido";
        header("Location: ../micasCamara.php");
        exit();
        //echo "Modelo repetido" . count($modelos_arreglo);
    } else {
        $_SESSION['modelos_repetido'] = "Protector repetido";
        header("Location: ../micasCamara.php");
        exit();
        //echo "Modelos repetido" . count($modelos_arreglo);
    }
}

?>