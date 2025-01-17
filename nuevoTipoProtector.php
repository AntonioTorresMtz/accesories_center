<?php
include("db.php");
include("includes/header.php");
if (isset($_SESSION['exito_TipoP'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo tipo de Protector!',
                        'Se ha creado una nuevo protector con exito!',
                        'success'
                      )</script>";
    unset($_SESSION['exito_TipoP']);
}
?>


<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/tipoNuevo.php" method="POST" class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Crear tipo de protector</h4>
            </div>
            <div class="col-12">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div class="col-12">
                <label class="form-label" for="nombre">Clave Sicar:</label>
                <input class="form-control" type="text" minlength="1" maxlength="50" name="clave" id="clave" required>
            </div>
            <div class="col-12">
                <label class="form-label" for="nombre">Precio:</label>
                <input class="form-control" type="number" min="1" name="precio" id="precio" required>
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