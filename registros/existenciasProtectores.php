<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost:3307", "root", "", "tienda3");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Realiza la consulta
$sql = "SELECT ma.marca, GROUP_CONCAT(DISTINCT mo.nombre SEPARATOR ', ') AS modelos, nt.nombre, t.cantidad, p.notas FROM protectores p
INNER JOIN marca ma ON ma.id_marca = p.marca
INNER JOIN modelo_funda m ON m.id_protector = p.id_protector
INNER JOIN modelos mo ON mo.id_modelo = m.tipo_modelo
INNER JOIN tipo_protector t ON t.id_protector = p.id_protector
INNER JOIN nombre_tipo_protector nt ON nt.id_nombreTipo = t.tipo
GROUP BY p.id_protector, nt.id_nombreTipo
ORDER BY ma.marca, modelos;";
$resultado = $conexion->query($sql);

// Procesa los resultados
$rows = array();
while ($row = $resultado->fetch_assoc()) {
    $rows[] = $row;
}

// Cierra la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportar a PDF</title>
    <style>
        /* Estilos CSS opcionales para dar formato a la tabla */
    </style>
</head>

<body>
    <h1>Lista de existencias</h1>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelos</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Notas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td>
                        <?php echo $row['marca']; ?>
                    </td>
                    <td>
                        <?php echo $row['modelos']; ?>
                    </td>
                    <td>
                        <?php echo $row['nombre']; ?>
                    </td>
                    <td>
                        <?php echo $row['cantidad']; ?>
                    </td>
                    <td>
                        <?php echo $row['notas']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>