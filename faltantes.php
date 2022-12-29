<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_Faltante'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nueva mica Curva!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_Faltante']);
        }
?>


    <div class="container">
        <form action="registros/faltante.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Anotar faltantes</h3>
            <div class="col-12">
                <label for="marca" class="form-label">Descripcion:</label>
                <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="10" placeholder="Tipo - Modelo - Marca"></textarea>                
            </div>

            <div class="col text-center">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>

<?php
    include("includes/footer.php")
?>