<?php
session_start();
include '../db.php';
$marca = $_POST["marca"];
$cantidad = $_POST["cantidad"];
$posicion = $_POST["posicion"];
$modelos_arreglo = array();
$modelo = ($_POST['modelo']);
if (isset($_POST['notas']) && !empty($_POST['notas'])) {
    // La variable 'nombre' está presente y no está vacía
    $notas = $_POST['notas'];
    // Realizar acciones con la variable 'nombre' aquí
} else {
    $notas = null;
}

while (true) {
    $modelo1 = current($modelo); //Modelo
    $modelos_arreglo[] = $modelo1;
    // Up! Next Value
    $modelo1 = next($modelo);
    // Check terminator
    if ($modelo1 === false)
        break;
}

$modelos_arreglo = array_unique($modelos_arreglo);

$contador = 0;
foreach ($modelos_arreglo as $model) {
    $verifica = "SELECT COUNT(*) as number FROM nombre_mica100d WHERE nombre_modelo = '$model';";
    echo "Modelo:" . $model . "<br>";
    $resultado_sp = mysqli_query($conn, $verifica);
    $row = mysqli_fetch_assoc($resultado_sp);
    $contador = $contador + $row["number"];
}

echo $contador;

if ($contador == 0) {

    $mica = "INSERT INTO micas100d (marca, cantidad, posicion, notas) VALUES ('$marca', '$cantidad','$posicion', '$notas')";

    $resultado = mysqli_query($conn, $mica);
    if (!$resultado) {
        echo 'Error mica <br>';
    } else {
        echo 'Exito mica <br>';
    }

    $modelo = ($_POST['modelo']);

    $idMica = "SELECT MAX(id_mica100d) FROM micas100d";
    $resultado = mysqli_query($conn, $idMica);
    $id;
    while ($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['MAX(id_mica100d)'];
    }

    foreach ($modelos_arreglo as $model) {
        $sql1 = "INSERT INTO nombre_mica100d (nombre_modelo, id_mica100d) VALUES ('$model', '$id')";
        echo $model . "<br>";
        $sqlRes = $conn->query($sql1); //Consulta para el insert
        if (!$sql1) {
            echo 'Error modelo<br>';
        } else {
            echo 'Exito modelo <br>';
        }
    }

    $_SESSION['exito_mica100d'] = "Mica guardada";
    header("Location: ../micasPrivacidad.php");
    exit();

} else {
    if (count($modelos_arreglo) == 1) {
        $_SESSION['modelo_repetido'] = "Protector repetido";
        header("Location: ../micasPrivacidad.php");
        exit();
        //echo "Modelo repetido" . count($modelos_arreglo);
    } else {
        $_SESSION['modelos_repetido'] = "Protector repetido";
        header("Location: ../micasPrivacidad.php");
        exit();
        //echo "Modelos repetido" . count($modelos_arreglo);
    }
}



?>