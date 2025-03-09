<?php
include("db.php");
include("includes/header.php");
if (isset($_SESSION['exito_ventaMicaCurva'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Exito en venta!',
                        'Se ha registrado la mica con exito!',
                        'success'
                      )</script>";
    unset($_SESSION['exito_ventaMicaCurva']);
}

if (isset($_SESSION['error_ventaMicaCurva'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Error en venta!',
                        'No se pudo encontrar el modelo seleccionado!',
                        'error'
                      )</script>";
    unset($_SESSION['error_ventaMicaCurva']);
}

?>
<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/ventaMicaCurva.php" method="POST"
            class="col-12 col-sm-8 col-md-6 col-lg-3 mx-auto shadow p-3 align-self-start" id="formulario">
            <div class="row text-center">
                <h4>Venta mica curva</h4>
            </div>
            <div class="col">
                <label for="marca" class="form-label">Marca</label>
                <select class="form-select" name="marca" id="marca">
                    <option value="0" disabled selected>Selecciona una marca </option>
                    <?php
                    $pos = "SELECT id_marca, marca FROM marca ORDER BY id_marca ASC";
                    $resultado = mysqli_query($conn, $pos);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id_marca = $row["id_marca"] ?>
                        <option value="<?php echo $id_marca ?>"> <?php echo $row["marca"] ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col">
                <label for="modelo" class="form-label">Modelo:</label>
                <select class="form-select" name="modelo" id="modelo">

                </select>
            </div>
            <div class="col">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" required id="cantidad">
            </div>
            <div class="col">
                <label for="precio" class="form-label">Precio:</label>
                <input class="form-control" type="number" name="precio" placeholder="Precio" required id="precio">
            </div>
            <div class="col">
                <label for="descuento" class="form-label">Descuento:</label>
                <input class="form-control" type="number" name="descuento" placeholder="Descuento" id="precio">
            </div>

            <div class="col text-center mt-2">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>

<script src="js/selectCurva.js"></script>
<script src="js/validaMarca.js"></script>

<?php
include("includes/footer.php")
    ?>