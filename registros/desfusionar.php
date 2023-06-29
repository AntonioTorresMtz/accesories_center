<?php
include('../db.php');
session_start();

$id_mica = $_POST['modelo'];
$id_modelo = $_POST['modelo2'];
$producto = intval($_POST['producto']);

echo 'Id_protector: ' . $id_mica . '<br>';
echo 'Id modelo : ' . $id_modelo . '<br>';


if ($producto == 6) {
    $cantidades1 = ($_POST['cantidades1']);
    $cantidades2 = ($_POST['cantidades2']);
    $tipos = $_POST['tipos'];
    // Convertir los valores de los arreglos a enteros
    $cantidades1 = array_map('intval', $cantidades1);
    $cantidades2 = array_map('intval', $cantidades2);
    $tipos = array_map('intval', $tipos);

    // Convertir los arreglos en JSON
    $json_cantidades1 = json_encode($cantidades1);
    $json_cantidades2 = json_encode($cantidades2);
    $json_tipos = json_encode($tipos);
    echo 'CANTIDADES 1 <br>';
    print_r($json_cantidades1);
    echo '<br>';
    echo 'CANTIDADES 2 <br>';
    print_r($json_cantidades2);
    echo '<br>';
    echo 'TIPOS 1 <br>';
    print_r($json_tipos);
    $sp = "SP_DIVIDIR_PROTECTOR";
     $resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo', '$json_cantidades1', '$json_cantidades2', '$json_tipos')");

} else {
 $cantidad1 = $_POST['cantidad1'];
 $cantidad2 = $_POST['cantidad2'];

 $sp = "SP_DIVIDIR";
 $resultado = mysqli_query($conn, "CALL $sp ('$producto', '$id_mica', '$id_modelo', '$cantidad1', '$cantidad2')");

}

if (!$resultado) {
 echo 'Error consulta al programador <br>';
 printf("Errormessage: %s\n", $conn->error);
} else {
 $_SESSION['desfusion'] = "Modelos separados";
 header("Location: ../desfusionarMenu.php");
 exit();
}
mysqli_close($conn);
?>