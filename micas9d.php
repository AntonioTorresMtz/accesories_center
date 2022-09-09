
    <?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_mica'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Exito en venta!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_mica']);
        }
    ?>

    <div class="container">
        <form action="nuevaMica9d.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Nueva mica de Completa</h3>
            <div class="col-6">
                <label for="marca" class="form-label">Marca:</label>
                <select name="marca" id="marca" class="form-select">
                    <option value="0" selected disabled>Selecciona una marca</option>
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
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" min="0" name="cantidad"  id="cantidad" required class="form-control">
            </div>
            <div class="col-3">
                <label for="ancho" class="form-label">Ancho:</label>
                <input type="number" name="ancho" step="any" id="ancho" required class="form-control">
            </div>
            <div class="col-3">
                <label for="largo" class="form-label">Largo:</label>
                <input type="number" name="largo" step="any" id="largo" required class="form-control"> 
            </div>
            <div class="col-3">
                <label class="form-label" for="largo">Muro:</label>
                <select name="muro" id="muro" class="form-select">
                    <option value="1" disabled selected>Selecciona un muro</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="col-3">
                <label for="largo" class="form-label">Posicion:</label>
                <select name="posicion" id="posicion" class="form-select">    
                </select>
            </div>
            <table class="table-borderless form-linea p-3"  id="tabla">
                <label for="modelo" class="form-label">Modelo:</label>
                <tr class="fila-fija">
                    <td >
                        <select name="modelo[]" class="form-select col-11" id="modelo">

                        </select>
                    </td>
                    <td class="eliminar"><button class="btn btn-dark" value="Menos -"><i class="fas fa-minus-circle"></i></button></td>  
                </tr>
            </table>
            <div class="col text-center">
                <button id="adicional" name="adicional" type="button" class="btn btn-dark"> <i class="far fa-plus-square"></i> </button>
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>        
    </div>

<script src="js/selectPosicion.js"></script>
<script src="js/agregarModelo.js"></script>

<?php
    include("includes/footer.php")
?>