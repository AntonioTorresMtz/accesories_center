<?php
include("db.php");
include("includes/header.php");
if (isset($_SESSION['exito_micaCam'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Nueva mica para camara!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
    unset($_SESSION['exito_micaCam']);
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
    <div class="row justify-content-center mt-3">
        <form action="registros/nuevaMicaCamIndividual.php" method="POST" class="col-12 col-sm-8 col-md-6 col-lg-3 mx-auto shadow p-3 align-self-start"
            id="formulario">
            <div class="row text-center">
                <h4>Nueva mica de camara Individual</h4>
            </div>
            <div class="row">
                <div class="col">
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
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="cantidad">Cantidad:</label>
                    <input class="form-control" type="number" min="0" name="cantidad" id="cantidad"
                        placeholder="Cantidad" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label" for="largo">Muro:</label>
                    <select name="muro" id="muro" class="form-select">
                        <option value="0" selected disabled>Selecciona un muro</option>
                        <?php
                        $pos = "SELECT DISTINCT muro FROM posicion;";
                        $resultado = mysqli_query($conn, $pos);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $id_marca = $row["id_marca"] ?>
                            <option value="<?php echo $row["muro"] ?>"> <?php echo $row["muro"] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-6">
                    <label class="form-label" for="largo">Posicion:</label>
                    <select name="posicion" id="posicion" class="form-select">
                    </select>
                </div>
            </div>
            <div class="row">
                <table class="col-12 table-borderless form-linea p-3" id="tabla">
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
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="notas" class="form-label">Notas:</label>
                    <textarea name="notas" id="notas" class="form-control" maxlength="200"></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col text-center">
                    <button id="adicional" name="adicional" type="button" class="btn btn-dark"> <i
                            class="far fa-plus-square"></i> </button>
                    <input type="submit" value="Guardar" class="btn btn-dark">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="js/selectPosicion.js"></script>
<script src="js/agregarModeloMicaCamIndi.js"></script>
<!-- <script src="js/valida_modelos.js"></script> -->

<?php
include("includes/footer.php")
    ?>