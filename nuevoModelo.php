<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_modeloNuevo'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo modelo!',
                        'Se ha creado un nuevo modelo con exito!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_modeloNuevo']);
        }
?>


    <div class="container">
        <form action="registros/modeloNuevo.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Nuevo Modelo</h3>
            <div class="col-6">
                <label for="marca" class="form-label">Marca:</label>
                <select name="marca" id="marca" class="form-select">
                    <?php
                        $pos="SELECT id_marca, marca FROM marca ORDER BY id_marca ASC";
                        $resultado = mysqli_query($conn, $pos);
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $id_marca = $row["id_marca"]?>
                            <option value="<?php echo $id_marca?>"> <?php echo $row["marca"]?> </option>
                    <?php  } ?>
                </select>
            </div>
            <div class="col-6">
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