<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_mica100d'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nueva mica de Privacidad!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_mica100d']);
        }
?>


    <div class="container">
        <form action="registros/nuevaMica100d.php" method="POST" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Nueva mica Privacidad</h3>
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
                <label class="form-label" for="cantidad">Cantidad:</label>
                <input class="form-control" type="number" min="0" name="cantidad"  id="cantidad" required>
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
                <label class="form-label" for="largo">Posicion:</label>
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