<?php
include('../db.php');

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];

$query = "INSERT INTO ventas (id_producto, marca, fecha, id_tipo, cantidad, precio, descuento, nombre_modelo)
 VALUES ('1', '$marca', NULL, NULL, '$cantidad', '$precio', '$descuento', '$modelo')";

$resultado = mysqli($conn, $query);





?>