<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_ventaMica9h'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Exito en venta!',
                        'Se ha registrado la mica con exito!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_ventaMica9h']);
        }

        if(isset($_SESSION['error_ventaMica9h'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Error en venta!',
                        'No se pudo encontrar el modelo seleccionado!',
                        'error'
                      )</script>";
                unset($_SESSION['error_ventaMica9h']);
        }

?>
    <div class="container">
        <form action="registros/ventaMica9h.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Venta protectores</h3>
            <div class="col-4">
                <label for="marca" class="form-label">Marca</label>
                <select class="form-select" name="marca" id="marca">
                    <option value="1" disabled selected>Selecciona una marca </option>
                <?php
                        $pos="SELECT id_marca, marca FROM marca ORDER BY id_marca ASC";
                        $resultado = mysqli_query($conn, $pos);
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $id_marca = $row["id_marca"]?>
                            <option value="<?php echo $id_marca?>"> <?php echo $row["marca"]?> </option>
                    <?php  } ?>
                </select>
            </div>
            <div class="col-4">
                <label for="modelo" class="form-label">Modelo:</label>
                <select class="form-select" name="modelo" id="modelo">
                        
                </select>
            </div>
            <div class="col-4">
                <label for="Tipo" class="form-label">Tipo:</label>
                <select class="form-select" name="tipo" id="tipo">
                        
                </select>
            </div>
            <div class="col-4">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" required id="cantidad">
            </div>
            <div class="col-4">
                <label for="precio" class="form-label">Precio:</label>
                <input class="form-control" type="number" name="precio" placeholder="Precio" required id="precio">
            </div>
            <div class="col-4">
                <label for="descuento" class="form-label">Descuento:</label>
                <input class="form-control" type="number" name="descuento" placeholder="descuento"  id="precio">
            </div>
            
            <div class="col text-center">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>

<script src="js/selectProtector.js"></script>

<?php
    include("includes/footer.php")
?>