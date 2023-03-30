
    <?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_mica9h'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nuevo registro!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_mica9h']);
        }
        if(isset($_SESSION['modelo_repetido'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Modelo repetido!',
                        'El modelo ya existe en el inventario, intenta actualizar su cantidad!',
                        'error'
                      )</script>";
                unset($_SESSION['modelo_repetido']);
        }
        if(isset($_SESSION['modelos_repetido'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Modelos repetidos!',
                        'Algún modelo ya existe en el inventario, intenta actualizar su cantidad!',
                        'error'
                      )</script>";
                unset($_SESSION['modelos_repetido']);
        }
    ?>

    <div class="container">
        <form action="registros/nuevaMica9h.php" method="POST" class="row g-3 mt-3" id="formulario">
            <h3 class="display-5 text-dark text-center font-weight-bold">Nueva mica normal</h3>
            <div class="col-4">
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
            <div class="col-4">
                <label for="camara" class="form-label">Camara:</label>
                <select name="camara" id="camara" class="form-select">
                    <option value="completa">Completa</option>
                    <option value="orilla">Orilla</option>
                    <option value="mitad">En medio</option>
                </select>
            </div>
            <div class="col-4">
                <label for="boton" class="form-label">Boton:</label>
                <select name="boton" id="boton" class="form-select">
                    <option value="no">No</option>
                    <option value="si">Si</option>
                </select>
            </div>
            <div class="col-4">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" min="0" name="cantidad"  id="cantidad" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="ancho" class="form-label">Ancho:</label>
                <input type="number" name="ancho" step="any" id="ancho" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="largo" class="form-label">Largo:</label>
                <input type="number" name="largo" step="any" id="largo" class="form-control" required> 
            </div>
            <div class="col-6">
                <label class="form-label" for="largo">Muro:</label>
                <select name="muro" id="muro" class="form-select">
                    <option value="1" disabled selected>Selecciona un muro</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="col-6">
                <label for="posicion" class="form-label">Posicion:</label>
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
<script src="js/valida_medidas.js"></script>

<?php
    include("includes/footer.php")
?>