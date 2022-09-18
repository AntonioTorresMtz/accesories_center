<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_TipoP'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo tipo de Protector!',
                        'Se ha creado una nuevo protector con exito!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_TipoP']);
        }
?>


    <div class="container">
        <form action="registros/tipoNuevo.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Nueva protector</h3>   
            <div class="col-12">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" min="0" name="nombre"  id="nombre" required>
            </div>
              <div class="col text-center">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>


<?php
    include("includes/footer.php")
?>