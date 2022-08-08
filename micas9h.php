
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
    ?>

    <div class="formulario container text-center border border-dark bg-light w-25 p-3 mt-2 rounded-5">
        <h2 class="text-light bg-dark p-2">Nueva mica normal</h2>
        <form action="registros/nuevaMica9h.php" method="POST">
            <div class="form-linea mt-2">
                <label for="marca">Marca:</label>
                <select name="marca" id="marca">
                    <option value="Iphone">Iphone</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Motorola">Motorola</option>
                    <option value="Huawei">Huawei</option>
                    <option value="Xiaomi">Xiaomi</option>
                    <option value="OPPO">OPPO</option>
                    <option value="ZTE">ZTE</option>
                    <option value="Alcatel">Alcatel</option>
                    <option value="LG">LG</option>
                    <option value="Universal">Universal</option>
                </select>
            </div>
            <div class="form-linea mt-2">
                <label for="camara">Camara:</label>
                <select name="camara" id="camara">
                    <option value="completa">Completa</option>
                    <option value="orilla">Orilla</option>
                    <option value="mitad">En medio</option>
                </select>
            </div>
            <div class="form-linea mt-2">
                <label for="boton">Boton:</label>
                <select name="boton" id="boton">
                    <option value="no">No</option>
                    <option value="si">Si</option>
                </select>
            </div>
            <div class="form-linea mt-2">
                <label for="cantidad">Cantidad:</label>
                <input type="number" min="0" name="cantidad"  id="cantidad" required>
            </div>
            <div class="form-linea mt-2">
                <label for="ancho">Ancho:</label>
                <input type="number" name="ancho" step="any" id="ancho" required>
            </div>
            <div class="form-linea mt-2">
                <label for="largo">Largo:</label>
                <input type="number" name="largo" step="any" id="largo" required> 
            </div>

            <div class="form-linea mt-2">
                <label for="largo">Posicion:</label>
                <select name="posicion" id="posicion">
                    <?php
                        $pos="SELECT id_posicion, nombre FROM posicion WHERE muro = '2' ORDER BY nombre ASC";
                        $resultado = mysqli_query($conn, $pos);
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $id_posicion = $row["id_posicion"]?>
                            <option value="<?php echo $id_posicion?>"> <?php echo $row["nombre"]?> </option>
                    <?php  } ?>
                    
                </select>
            </div>
            <label for="">Modelo:</label>
            <table class="table table-borderless form-linea mt-2"  id="tabla">
                <tr class="fila-fija">
                    <td> <input type="text" name="modelo[]" placeholder="modelo" required> </td>
                    <td class="eliminar"><button class="btn btn-dark" value="Menos -"><i class="fas fa-minus-circle"></i></button></td>
                </tr>
            </table>
            <button id="adicional" name="adicional" type="button" class="btn btn-dark"> <i class="far fa-plus-square"></i> </button>
            <input type="submit" value="Guardar" class="btn btn-dark">
        </form>        
    </div>





<?php
    include("includes/footer.php")
?>