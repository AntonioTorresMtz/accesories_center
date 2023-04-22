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
    $verifica = "SELECT COUNT(*) as number FROM nombre_mica9h WHERE nombre_modelo = '$model';";
    echo "Modelo:" . $model . "<br>";
    $resultado_sp = mysqli_query($conn, $verifica);
    $row = mysqli_fetch_assoc($resultado_sp);
    $contador = $contador + $row["number"];
}

echo $contador;

if ($contador == 0) {
    $mica = "INSERT INTO micas9h (marca, cantidad, ancho, largo, camara, posicion, boton) VALUES ('$marca', '$cantidad',
    '$ancho', '$largo', '$camara', '$posicion', '$boton')";

    $resultado = mysqli_query($conn, $mica);
    if (!$resultado) {
        echo 'Error mica <br>';
    } else {
        echo 'Exito mica <br>';
        $idMica = "SELECT MAX(id_mica9h) FROM micas9h";
        $resultado = mysqli_query($conn, $idMica);
        $id;
        while ($row = mysqli_fetch_assoc($resultado)) {
            $id = $row['MAX(id_mica9h)'];
        }

        foreach ($modelos_arreglo as $model) {
            $sql1 = "INSERT INTO nombre_mica9h (nombre_modelo, id_mica9h) VALUES ('$model', '$id')";
            echo $model . "<br>";
            $sqlRes = $conn->query($sql1); //Consulta para el insert
            if (!$sql1) {
                echo 'Error modelo<br>';
            } else {
                echo 'Exito modelo <br>';
            }
        }

        //$_SESSION['exito_mica9h'] = "Mica guardada";
        //header("Location:../micas9h.php");
        //exit();
    }
} else {
    if (count($modelos_arreglo) == 1) {
        $_SESSION['modelo_repetido'] = "Protector repetido";
        header("Location: ../micas9h.php");
        exit();
        //echo "Modelo repetido" . count($modelos_arreglo);
    } else {
        $_SESSION['modelos_repetido'] = "Protector repetido";
        header("Location: ../micas9h.php");
        exit();
        //echo "Modelos repetido" . count($modelos_arreglo);
    }
}

/*
}*/

?>