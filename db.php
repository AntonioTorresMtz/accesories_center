<?php


$fechaActual = new DateTime();  // Fecha actual

$fechaComparar = DateTime::createFromFormat('d-m-Y', '02-08-2023');  // Fecha a comparar (2 de agosto de 2023)

if ($fechaActual < $fechaComparar) {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'tienda3'
    );
} elseif ($fechaActual > $fechaComparar) {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'tienda4'
    );
} else {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'tienda3'
    );
}

/*if(isset($conn)){
    echo 'Base de datos conectada';
} */
