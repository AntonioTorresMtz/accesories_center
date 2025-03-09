<?php
include("includes/header.php");
include("db.php");
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
        <form action="registros/nuevoProtector.php" method="POST" class="col-12 col-sm-8 col-md-6 col-lg-3 mx-auto shadow p-3 align-self-start"
            id="formulario">
            <div class="row text-center">
                <h4>Nuevo protector</h4>
            </div>
            <div class="row">
                <div class="col-12">
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
                    <label for="posicion" class="form-label">Posicion:</label>
                    <select name="posicion" id="posicion" class="form-select">
                    </select>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-12 text-centar">
                    <label>Tipo:</label>
                </div>
                <table class="table-borderless form-linea p-3" id="tablaTipo">
                    <tr class="fila-fija">
                        <td>
                            <select name="tipo[]" id="tipo" class="form-select col-6" required>
                                <option value="0" disabled selected>--Selecciona tipo de funda --</option>
                                <?php
                                $pos = "SELECT id_nombreTipo, nombre FROM nombre_tipo_protector";
                                $resultado = mysqli_query($conn, $pos);
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $id_nombre = $row["id_nombreTipo"] ?>
                                    <option value="<?php echo $id_nombre ?>"> <?php echo $row["nombre"] ?> </option>
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
                    <label class="form-label">Agregar tipo de funda:</label>
                    <button id="adicionalTipo" name="adicional" type="button" class="btn btn-dark"> <i
                            class="far fa-plus-square"></i> </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-centar">
                    <label>Modelo:</label>
                </div>
                <table class="table-borderless form-linea p-3" id="tabla">
                    <tr class="fila-fija">

                        <td> <select type="text" name="modelo[]" id="modelo" class="col form-select"
                                placeholder="Modelo:" required> </select> </td>
                        <td class="eliminar"><button class="btn btn-dark" value="Menos -"><i
                                    class="fas fa-minus-circle"></i></button></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <div class="col text-center">
                    <label class="form-label">Agregar tipo de modelo:</label>
                    <button id="adicional" name="adicional" type="button" class="btn btn-dark"> <i
                            class="far fa-plus-square"></i> </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="notas" class="form-label">Notas:</label>
                    <textarea name="notas" id="notas" class="form-control" maxlength="200"></textarea>
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



<script src="js/agregarModeloProtector.js"></script>
<script src="js/selectPosicion.js"></script>
<script src="js/validaProtectores.js"></script>

<?php
include("includes/footer.php")
    ?>