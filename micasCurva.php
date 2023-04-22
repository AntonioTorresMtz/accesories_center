<?php
include("db.php");
include("includes/header.php");
if (isset($_SESSION['exito_micaCurva'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Nueva mica Curva!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
    unset($_SESSION['exito_micaCurva']);
}

if (isset($_SESSION['modelo_repetido'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Modelo repetido!',
                        'El modelo ya existe en el inventario, intenta actualizar su cantidad!',
                        'error'
                      )</script>";
    unset($_SESSION['modelo_repetido']);
}
if (isset($_SESSION['modelos_repetido'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Modelos repetidos!',
                        'Algún modelo ya existe en el inventario, intenta actualizar su cantidad!',
                        'error'
                      )</script>";
    unset($_SESSION['modelos_repetido']);
}
?>


<div class="container">
    <form action="registros/nuevaMicaCurva.php" method="POST" class="row g-3 mt-3" id="formulario">
        <h3 class="display-5 text-dark text-center font-weight-bold">Nueva mica Curva</h3>
        <div class="col-6">
            <label for="marca" class="form-label">Marca:</label>
            <select name="marca" id="marca" class="form-select">
                <option value="0" selected disabled>Selecciona una marca</option>
                <?php
                $pos = "SELECT id_marca, marca FROM marca ORDER BY id_marca ASC";
                $resultado = mysqli_query($conn, $pos);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $id_marca = $row["id_marca"] ?>
                    <option value="<?php echo $id_marca ?>"> <?php echo $row["marca"] ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="cantidad">Cantidad:</label>
            <input class="form-control" type="number" min="0" name="cantidad" id="cantidad" placeholder="Cantidad"
                required>
        </div>

        <div class="col-6">
            <label class="form-label" for="largo">Muro:</label>
            <select name="muro" id="muro" class="form-select">
                <option value="0" disabled selected>Selecciona un muro</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label" for="largo">Posicion:</label>
            <select name="posicion" id="posicion" class="form-select">
            </select>
        </div>
        <table class="table-borderless form-linea p-3" id="tabla">
            <label for="">Modelo:</label>
            <tr class="fila-fija">
                <td>
                    <select name="modelo[]" class="form-select col-11" id="modelo">

                    </select>
                </td>
                <td class="eliminar"><button class="btn btn-dark" value="Menos -"><i
                            class="fas fa-minus-circle"></i></button></td>
            </tr>
        </table>

        <div class="col text-center">
            <button id="adicional" name="adicional" type="button" class="btn btn-dark"> <i
                    class="far fa-plus-square"></i> </button>
            <input type="submit" value="Guardar" class="btn btn-dark">
        </div>
    </form>
</div>

<script src="js/selectPosicion.js"></script>
<script src="js/agregarModelo.js"></script>
<script src="js/valida_modelos.js"></script>

<?php
include("includes/footer.php")
    ?>