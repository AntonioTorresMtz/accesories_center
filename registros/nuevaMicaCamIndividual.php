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

$mica = "INSERT INTO tbl_mica_camara_individual (FK_marca, cantidad, FK_posicion, notas) VALUES ('$marca', '$cantidad','$posicion', '$notas')";

$resultado = mysqli_query($conn, $mica);
if (!$resultado) {
    echo 'Error consulta al programador ' . $conn->error;
} else {
    echo 'Exito mica <br>';
    $modelo = ($_POST['modelo']);

    $idMica = "SELECT MAX(PK_mica_camara) FROM tbl_mica_camara_individual";
    $resultado = mysqli_query($conn, $idMica);
    $row = mysqli_fetch_assoc($resultado);
    $id = $row['MAX(PK_mica_camara)'];
    echo 'ID mica camara: ' . $id . '<br>';


    foreach ($modelos_arreglo as $model) {
        $sql1 = "INSERT INTO rel_mica_camara_modelo (FK_modelo, FK_mica_camara_individual) VALUES ('$model', '$id')";
        echo $model . "<br>";
        $sqlRes = $conn->query($sql1); //Consulta para el insert
        if (!$sql1) {
            echo 'Error modelo<br>';
        } else {
            echo 'Exito modelo <br>';
        }
    }

    $_SESSION['exito_micaCam'] = "Mica guardada";
    header("Location: ../micasCamaraIndividual.php");
    exit();


}

?>