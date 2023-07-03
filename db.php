<?php


$fechaActual = new DateTime();  // Fecha actual

$fechaComparar = DateTime::createFromFormat('d-m-Y', '03-08-2023');  // Fecha a comparar (3 de agosto de 2023)

if ($fechaActual < $fechaComparar) {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'tienda4'
    );
} elseif ($fechaActual > $fechaComparar) {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'tienda5'
    );
} else {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'tienda4'
    );
}

/*if(isset($conn)){
    echo 'Base de datos conectada';
} */
