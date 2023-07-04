<?php
include("db.php");
include("includes/header.php");

if (isset($_SESSION['exito'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo nombre!',
                        'Se ha cambiadom el nombre del tipo de protector!',
                        'success'
                      )</script>";
    unset($_SESSION['exito']);
}

?>


<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/editaTipoProtector.php" method="POST" class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Editar nombre tipo de protector</h4>
            </div>
            <div class="col-12">
                <label for="tipo" class="form-label">Tipo Protector:</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="0" selected disabled>Selecciona un tipo de protector</option>
                    <?php
                    $pos = "SELECT * FROM nombre_tipo_protector ORDER BY nombre ASC";
                    $resultado = mysqli_query($conn, $pos);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id_marca = $row["id_nombreTipo"] ?>
                        <option value="<?php echo $id_marca ?>"> <?php echo $row["nombre"] ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" min="0" name="nombre" id="nombre" placeholder="Nuevo nombre" required>
            </div>
            <div class="col text-center mt-2">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>


<?php
include("includes/footer.php")
    ?>