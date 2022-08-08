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
        <form action="" class="row g-3 mt-3">
            <div class="col-6">
                <label for="marca" class="form-label">Marca:</label>
                <select name="marca" id="marca" class="form-select">
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
            <div class="col-6">
                <label class="form-label" for="cantidad">Cantidad:</label>
                <input class="form-control" type="number" min="0" name="cantidad"  id="cantidad" required>
            </div>
            <div class="col-3">
                <label class="form-label" for="ancho">Ancho:</label>
                <input class="form-control" type="number" name="ancho" step="any" id="ancho" required>
            </div>
            <div class="col-3">
                <label class="form-label" for="largo">Largo:</label>
                <input class="form-control" type="number" name="largo" step="any" id="largo" required> 
            </div>
            <div class="col-3">
                <label for="muro" class="form-label">Marca:</label>
                <select name="muro" id="muro" class="form-select">
                    
                </select>
            </div>
            <div class="col-3">
                <label class="form-label" for="largo">Posicion:</label>
                <select name="posicion" id="posicion" class="form-select">
                    <?php
                        $pos="SELECT id_posicion, nombre FROM posicion WHERE muro = '1' ";
                        $resultado = mysqli_query($conn, $pos);
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $id_posicion = $row["id_posicion"]?>
                            <option value="<?php echo $id_posicion?>"> <?php echo $row["nombre"]?> </option>
                    <?php  } ?>
                    
                </select>
            </div>
            <table class="table-borderless form-linea p-3"  id="tabla">
                <label for="">Modelo:</label>
                <tr class="fila-fija">
                    <td > <input class="form-control col-11" type="text" name="modelo[]" placeholder="modelo" required> </td>
                    <td class="eliminar"><button class="btn btn-dark" value="Menos -"><i class="fas fa-minus-circle"></i></button></td>  
                </tr>
            </table>

            <div class="col text-center">
                <button id="adicional" name="adicional" type="button" class="btn btn-dark"> <i class="far fa-plus-square"></i> </button>
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>

<?php
    include("includes/footer.php")
?>