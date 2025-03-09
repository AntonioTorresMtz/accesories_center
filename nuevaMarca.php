<?php
include("db.php");
include("includes/header.php");
if (isset($_SESSION['exito_nuevaMarca'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo marca!',
                        'Se ha creado una nueva marca con exito!',
                        'success'
                      )</script>";
    unset($_SESSION['exito_nuevaMarca']);
}

if (isset($_SESSION['error_nuevaMarca'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Error en nueva marca!',
                        'La marca ingresada ya existe!',
                        'error'
                      )</script>";
    unset($_SESSION['error_nuevaMarca']);
}
?>


<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/marcaNueva.php" method="POST" class="col-12 col-sm-8 col-md-6 col-lg-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Agregar una marca</h4>
            </div>
            <div class="col-12">
                <label class="form-label" for="nombre">Marca:</label>
                <input class="form-control" type="text" min="0" name="nombre" id="nombre" required>
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