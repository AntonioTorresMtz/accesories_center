<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_nuevaMarca'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo marca!',
                        'Se ha creado una nueva marca con exito!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_nuevaMarca']);
        }

        if(isset($_SESSION['error_nuevaMarca'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Error en nueva marca!',
                        'La marca ingresada ya existe!',
                        'error'
                      )</script>";
                unset($_SESSION['error_nuevaMarca']);
        }
?>


    <div class="container">
        <form action="registros/marcaNueva.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Nueva marca</h3>   
            <div class="col-12">
                <label class="form-label" for="nombre">Marca:</label>
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