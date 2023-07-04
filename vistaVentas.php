<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/ventasAccesorios.php");
if (isset($_POST['buscar'])) {
    $inicio = $_POST["fechaInicio"];
    $fin = $_POST["fechaFinal"];
    $fin = date('Y-m-d', strtotime($fin . ' +1 day'));

    $_SESSION['fechaInicio'] = $inicio;
    $_SESSION['fechaFinal'] = $fin;
}
?>
<div class="container pt-5">
    <div>
        <h1 class="text-center">Lista de ventas de Accesorios</h1>
    </div>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="row align-items-end">
                <div class="col-5">
                    <div class="form-group">
                        <label for="fechaInicio">Inicio:</label>
                        <input type="date" class="form-control" id="fechaInicio" placeholder="Inicio"
                            name="fechaInicio">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="fechaFinal">Final:</label>
                        <input type="date" class="form-control" id="fechaFinal" placeholder="Final" name="fechaFinal">
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary" id="btnBuscar" value="buscar"
                        name="buscar">Buscar</button>
                </div>
            </div>
        </form>
    </div>


    <div class="table-responsive" style="max-height: 600px;">
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="result">
                <?php
                if (isset($_POST['buscar'])) {
                    $query = "SELECT v.id_venta, p.nombre as producto, n.nombre, m.marca, mo.nombre as model, v.fecha, v.cantidad, v.precio,
            v.descuento, v.cantidad * v.precio - v.descuento AS total FROM ventas v
            INNER JOIN productos p ON p.id_producto = v.id_producto
            INNER JOIN marca m ON m.id_marca = v.marca
            LEFT JOIN nombre_tipo_protector n ON n.id_nombreTipo = v.id_tipo
            INNER JOIN modelos mo ON mo.id_modelo = v.nombre_modelo
            WHERE v.fecha BETWEEN '$inicio' and '$fin'
            ORDER BY v.id_venta DESC";

                    $res = $conn->query($query);
                    if ($res->num_rows == 0) {
                        echo "No hay ventas en este rango de fechas";
                    } else {
                        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row['fecha'] . "</td>";
                            echo "<td>" . $row['producto'] . "</td>";
                            echo "<td>" . $row['marca'] . "</td>";
                            echo "<td>" . $row['model'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['cantidad'] . "</td>";
                            echo "<td>" . $row['precio'] . "</td>";
                            echo "<td>" . $row['descuento'] . "</td>";
                            echo "<td>" . $row['total'] . "</td>";
                            echo "<td>";
                            echo '<button class="btn btn-primary btn-editar m-1" data-id="' . $row['id_venta'] . '" data-toggle="modal" data-target="#modalEditar">Editar</button>';
                            echo '<button class="btn btn-danger" data-id="' . $row['id_venta'] . '">Borrar</button>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Venta</h5>
            </div>
            <div class="modal-body">
                <form action="registros/actualizacion_Venta.php" method="POST">

                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="descuento">Descuento:</label>
                        <input type="number" class="form-control" id="descuento" name="descuento">
                    </div>
                    <div id="id"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/modalVentasAccesorios.js"></script>

<?php
include("includes/footer.php")
    ?>