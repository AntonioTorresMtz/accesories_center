<?php
include ("includes/header.php");
include ("db.php");
if (isset($_SESSION['exito_protector'])) {
    echo "<script type='text/javascript'>Swal.fire(
                    'Registro exitoso!',
                    'Se ha guardado el protector exitosamente!',
                    'success'
                  )</script>";
    unset($_SESSION['exito_protector']);
}
if (isset($_SESSION['protector_repetido'])) {
    echo "<script type='text/javascript'>Swal.fire(
                    'Modelo repetido!',
                    'El modelo ya existe en el inventario, intenta actualizar su cantidad!',
                    'error'
                  )</script>";
    unset($_SESSION['protector_repetido']);
}
if (isset($_SESSION['protectores_repetido'])) {
    echo "<script type='text/javascript'>Swal.fire(
                    'Modelos repetidos!',
                    'Algún modelo ya existe en el inventario, intenta actualizar su cantidad!',
                    'error'
                  )</script>";
    unset($_SESSION['protectores_repetido']);
}
?>

<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/nuevaVenta.php" method="POST" class="col-md-4 shadow p-3 align-self-start"
            id="formulario">
            <div class="row text-center">
                <h4>Nueva Venta</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="cliente" class="form-label">Cliente:</label>
                    <select name="cliente" id="cliente" class="form-select">
                        <option value="0" selected disabled>Selecciona un cliente</option>
                        <?php
                        $pos = "SELECT pk_cliente, nombres_cliente FROM tbl_cliente ORDER BY nombres_cliente ASC";
                        $resultado = mysqli_query($connFacturas, $pos);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $id_cliente = $row["pk_cliente"] ?>
                            <option value="<?php echo $id_cliente ?>"> <?php echo $row["nombres_cliente"] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="iva" class="form-label">IVA:</label>
                    <input type="number" min="0" name="iva" id="iva" required class="form-control">
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-12 text-centar">
                    <label>Productos:</label>
                </div>
                <table class="table-borderless form-linea p-3" id="tablaTipo">
                    <tr class="fila-fija">
                        <td>
                            <select name="productos[]" id="productos" class="form-select col-6" required>
                                <option value="0" disabled selected>--Selecciona un producto --</option>
                                <?php
                                $pos = "SELECT pk_producto, nombre_producto FROM tbl_producto";
                                $resultado = mysqli_query($connFacturas, $pos);
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $id_producto = $row["pk_producto"] ?>
                                    <option value="<?php echo $id_producto ?>"> <?php echo $row["nombre_producto"] ?> </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td> <input type="number" name="cantidad[]" placeholder="Cantidad" class="form-control col-6"
                                required>
                        </td>
                        <td class="eliminarTipo"><button class="btn btn-dark" value="Menos -"><i
                                    class="fas fa-minus-circle"></i></button></td>
                    </tr>
                </table>
            </div>
            <div class="row mt-2">
                <div class="col text-center">
                    <label class="form-label">Agregar producto:</label>
                    <button id="adicionalTipo" name="adicional" type="button" class="btn btn-dark"> <i
                            class="far fa-plus-square"></i> </button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">

                    <input type="submit" value="Guardar" class="btn btn-dark">
                </div>
            </div>

        </form>
    </div>
</div>


<?php
include ("includes/footer.php")
    ?>