<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_actual_Protector'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Exito en venta!',
                        'Se ha registrado la mica con exito!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_actual_Protector']);
        }

        if(isset($_SESSION['exito_NuevoTipo'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo tipo creado!',
                        'El tipo de protector no existia, ahora se ha agregado al inventario!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_NuevoTipo']);
        }

?>
    <div class="container">
        <form action="registros/actualizacion_Protectores.php" method="POST" class="row g-3 mt-3" id="formulario">
            <h3 class="display-5 text-dark text-center font-weight-bold">Actualizar protectores</h3>
            <div class="col-4">
                <label for="marca" class="form-label">Marca</label>
                <select class="form-select" name="marca" id="marca">
                    <option value="0" disabled selected>Selecciona una marca </option>
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
                <option value="0" disabled selected>Selecciona un tipo de protector </option>
                    <?php
                        $pos="SELECT id_nombreTipo, nombre FROM nombre_tipo_protector";
                        $resultado = mysqli_query($conn, $pos);
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $id_marca = $row["id_nombreTipo"]?>
                            <option value="<?php echo $id_marca?>"> <?php echo $row["nombre"]?> </option>
                    <?php  } ?>
                        
                </select>
            </div>
            <div class="col-4">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" required id="cantidad">
            </div>  
            <div class="col-8">
                <p id="detalles"></p>
            </div>          
            
            <div class="col-12 text-center">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>

<script src="js/selectProtector_new.js"></script>
<script src="js/validaProtectorVenta.js"></script>

<?php
    include("includes/footer.php")
?>