<?php
include("db.php");
include("includes/header.php");
if (isset($_SESSION['exito_plan'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Se registro el pago!',
                        'Se ha registrado el pago del plan con exito!',
                        'success'
                      )</script>";
    unset($_SESSION['exito_plan']);
}


?>
<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/planes_insertar.php" method="POST" class="col-md-3 shadow p-3 align-self-start"
            id="formulario">
            <div class="row text-center">
                <h4>Plan telcel</h4>
            </div>
            <div class="col-12">
                <label for="folio" class="form-label">Folio:</label>
                <input class="form-control" type="text" name="folio" placeholder="Folio" required id="folio">
            </div>
            <div class="col-12">
                <label for="Cliente" class="form-label">Cliente:</label>
                <input class="form-control" type="text" name="cliente" placeholder="Cliente" required id="cliente">
            </div>
            <div class="col-12">
                <label for="telefono" class="form-label">Telefono:</label>
                <input class="form-control" type="text" name="telefono" placeholder="Telefono" required id="telefono">
            </div>
            <div class="col-12">
                <label for="monto" class="form-label">Monto:</label>
                <input class="form-control" type="text" name="monto" placeholder="Monto" required id="monto">
            </div>
            
            <div class="col text-center pt-2">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>

<script src="js/select9D.js"></script>
<script src="js/validaMarca.js"></script>

<?php
include("includes/footer.php")
    ?>