
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

    <div class="formulario">
        <form action="nuevaMica9d.php" method="POST">
            <div class="form-linea">
                <label for="marca">Marca</label>
                <select name="marca" id="marca">
                    <option value="Iphone">Iphone</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Motorola">Motorola</option>
                    <option value="Huawei">Huawei</option>
                    <option value="Xiaomi">Xiaomi</option>
                    <option value="OPPO">OPPO</option>
                    <option value="LG">LG</option>
                    <option value="Universal">Universal</option>
                </select>
            </div>
            <div class="form-linea">
                <label for="cantidad">Cantidad</label>
                <input type="number" min="0" name="cantidad"  id="cantidad">
            </div>
            <div class="form-linea">
                <label for="ancho">Ancho</label>
                <input type="number" name="ancho" step="any" id="ancho">
            </div>
            <div class="form-linea">
                <label for="largo">Largo</label>
                <input type="number" name="largo" step="any" id="largo"> 
            </div>

            <div class="form-linea">
            <label for="largo">Posicion</label>
                <select name="posicion" id="posicion">
                    <?php
                        $pos="SELECT id_posicion, nombre FROM posicion WHERE muro = '1' ";
                        $resultado = mysqli_query($conn, $pos);
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $id_posicion = $row["id_posicion"]?>
                            <option value="<?php echo $id_posicion?>"> <?php echo $row["nombre"]?> </option>
                    <?php  } ?>
                    
                </select>
            </div>
            <label for="">Modelo</label>
            <table class="table bg-info form-linea"  id="tabla">
                <tr class="fila-fija">
                    <td> <input type="text" name="modelo[]" placeholder="modelo"> </td>
                    <td class="eliminar"><button value="Menos -"><i class="fas fa-minus-circle"></i></button></td>
                </tr>
            </table>
            <button id="adicional" name="adicional" type="button" class="btn btn-warning"> <i class="far fa-plus-square"></i> </button>
            <input type="submit" value="Guardar">
        </form>        
    </div>


<?php
    include("includes/footer.php")
?>