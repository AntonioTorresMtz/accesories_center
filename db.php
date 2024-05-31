<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'tienda3'
);

$connRecargas = mysqli_connect(
    'localhost',
    'root',
    '',
    'recargas'
);

$connFacturas = mysqli_connect(
    'localhost',
    'root',
    '',
    'facturas'
);

/*if(isset($conn)){
    echo 'Base de datos conectada';
} */
