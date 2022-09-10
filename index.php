<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_actual_Mica9d'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Actualizacion exitosa!',
                        'Se ha actualizado la cantidad de Micas exitosamente!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_actual_Mica9d']);
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
        <form action="registros/actualizacion_Mica9d.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Buscar Modelo</h3>
            <div class="col-6">
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
            <div class="col-6">
                <label for="modelo" class="form-label">Modelo:</label>
                <select class="form-select" name="modelo" id="modelo">
                        
                </select>
            </div>
            
        </form>
    </div>

    
    <div class="container mt-3" id="compatibles">
        
    </div>

<script src="js/modelo.js"></script>

<?php
    include("includes/footer.php")
?>