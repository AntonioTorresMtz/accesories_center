<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_Faltante'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nueva mica Curva!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_Faltante']);
        }
?>
<div class="container">
    <div class="table-responsive">
    <table class="table table-striped table-borderless table-hover">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo Protector</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="result">
        <?php
            $query = "SELECT p.nombre as producto, n.nombre, m.marca, mo.nombre as model, v.fecha, v.cantidad, v.precio,
            v.descuento, v.cantidad * v.precio - v.descuento AS total FROM ventas v
            INNER JOIN productos p ON p.id_producto = v.id_producto
            INNER JOIN marca m ON m.id_marca = v.marca
            LEFT JOIN nombre_tipo_protector n ON n.id_nombreTipo = v.id_tipo
            INNER JOIN modelos mo ON mo.id_modelo = v.nombre_modelo
            ORDER BY v.id_venta DESC";

            $res = $conn->query($query);
            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr> <td>" . $row['fecha']. "</td>".
                "<td>" . $row['producto']. "</td>".
                "<td>" . $row['marca']. "</td>".
                "<td>" . $row['model']. "</td>".
                "<td>" . $row['nombre']. "</td>".
                "<td>" . $row['cantidad']. "</td>".
                "<td>" . $row['precio']. "</td>".
                "<td>" . $row['descuento']. "</td>".
                "<td>" . $row['total']. "</td>".
                "</tr>";
            }

        ?> 
        </tbody>
    </table>
    </div>
</div>
       
<?php
    include("includes/footer.php")
?>