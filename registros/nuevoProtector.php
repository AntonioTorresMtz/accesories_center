<?php
session_start();
include '../db.php';
$marca = $_POST["marca"];
$posicion = $_POST["posicion"];
$muro = $_POST['muro'];
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
    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
    $modelo1 = current($modelo); //Modelo
    $modelos_arreglo[] = $modelo1;
    // Up! Next Value
    $modelo1 = next($modelo);
    // Check terminator
    if ($modelo1 === false)
        break;
}

$cantidad = ($_POST['cantidad']);
$tipo = ($_POST['tipo']);
$tipo_arreglo = array();
$cantidad_arreglo = array();
while (true) {
    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////        
    $cantidad1 = current($cantidad); //Cantidad
    $tipo1 = current($tipo); //Tipo
    $cantidad_arreglo[] = $cantidad1;
    $tipo_arreglo[] = $tipo1;
    // Up! Next Value
    $tipo1 = next($tipo);
    $cantidad1 = next($cantidad);
    // Check terminator
    if ($cantidad1 === false || $tipo1 === false)
        break;
}

$tipo_arreglo_sin_repetidos = array_unique($tipo_arreglo);
$tipo_arreglo_sin_repetidos = array_values($tipo_arreglo_sin_repetidos);

$cantidad_arreglo_sin_repetidos = [];
foreach ($tipo_arreglo_sin_repetidos as $indice => $valor) {
    $cantidad_arreglo_sin_repetidos[] = $cantidad_arreglo[$indice];
}



/*Convertimos todos los valores de los arrelgos a enteros*/
$tipo_arreglo_sin_repetidos = array_map('intval', $tipo_arreglo_sin_repetidos);
$cantidad_arreglo_sin_repetidos = array_map('intval', $cantidad_arreglo_sin_repetidos);
$modelos_arreglo = array_map('intval', $modelos_arreglo);

/*Convertimos los arreglos a JSON*/
$json_tipo = json_encode($tipo_arreglo_sin_repetidos);
$json_cantidad = json_encode(($cantidad_arreglo_sin_repetidos));
$json_modelo = json_encode($modelos_arreglo);

/*Mandamos llamar a la SP que actualizara los datos */
$sp = "SP_INSERTAR_PROTECTOR";
$resultado = mysqli_query($conn, "CALL $sp ('$marca', '$posicion', '$notas', '$json_tipo', '$json_cantidad', '$json_modelo')");

if (!$resultado) {
    echo 'Error consulta al programador <br>';
    printf("Errormessage: %s\n", $conn->error);
} else {
    mysqli_close($conn);
    $_SESSION['exito_protector'] = "Fusion hecha";
    header("Location: ../protectores.php");
    exit();
}
?>