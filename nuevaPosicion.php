<?php
include("db.php");
include("includes/header.php");

if (isset($_SESSION['posicion'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Nueva posicion!',
                        'Se ha creado una nueva posicion con exito!',
                        'success'
                      )</script>";
    unset($_SESSION['posicion']);
}
?>


<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/posicionNueva.php" method="POST" class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Nueva posicion</h4>
            </div>
            <div class="col-12">
                <label class="form-label" for="muro">Muro:</label>
                <input class="form-control" type="number" min="1" name="muro" id="muro" required
                    placeholder="Numero de muro">
            </div>
            <div class="col-12">
                <label class="form-label" for="letra">Letra:</label>
                <input class="form-control" type="text" name="letra" id="letra" required
                    placeholder="Puede ser hasta 4 letras juntas">
            </div>
            <div class="col-12">
                <label class="form-label" for="cantidad">Cantidad:</label>
                <input class="form-control" type="number" min="0" name="cantidad" id="cantidad" required
                    placeholder="Cantidad de posiciones a crear">
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