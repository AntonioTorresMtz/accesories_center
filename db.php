<?php
$conn = mysqli_connect(
    'localhost:3307',
    'root',
    '',
    'tienda3'
);
// Establecer la codificación a utf8mb4
if (!$conn->set_charset("utf8mb4")) {
    printf("Error cargando el conjunto de caracteres utf8mb4: %s\n", $conn->error);
    exit();
}
$connRecargas = mysqli_connect(
    'localhost:3307',
    'root',
    '',
    'recargas'
);


/*if(isset($conn)){
    echo 'Base de datos conectada';
} */
