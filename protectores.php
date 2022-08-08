<?php
    include("includes/header.php");
    include("db.php");
    if(isset($_SESSION['exito_protector'])){
        echo "<script type='text/javascript'>Swal.fire(
                    'Registro exitoso!',
                    'Se ha guardado el protector exitosamente!',
                    'success'
                  )</script>";
            unset($_SESSION['exito_protector']);
    }
?>

<div class="formulario container text-center border border-dark bg-light w-25 p-3 mt-2 rounded-5">
    <form action="registros/nuevoProtector.php" method="POST">
        <div class="form-linea mt-2">
            <label for="marca">Marca</label>
            <select name="marca" id="marca">
                <option value="Iphone">Iphone</option>
                <option value="Samsung">Samsung</option>
                <option value="Motorola">Motorola</option>
                <option value="Huawei">Huawei</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="OPPO">OPPO</option>
                <option value="LG">LG</option>
                <option value="ZTE">ZTE</option>
            </select>
        </div>

        <div class="form-linea mt-2">
        <label for="largo">Posicion</label>
            <select name="posicion" id="posicion">
                <?php
                    $pos="SELECT id_posicion, nombre FROM posicion WHERE muro = '3' ORDER BY nombre ASC";
                    $resultado = mysqli_query($conn, $pos);
                    while($row = mysqli_fetch_assoc($resultado)) {
                        $id_posicion = $row["id_posicion"]?>
                        <option value="<?php echo $id_posicion?>"> <?php echo $row["nombre"]?> </option>
                <?php  } ?>
                
            </select>
        </div>
        <table class="mx-auto table-borderless form-linea mt-2"  id="tablaTipo">
            <tr class="fila-fija">
                <td> 
                    <select name="tipo[]" id="tipo" required>
                        <option value="acrigel">Acrigel</option>
                        <option value="original">Original</option>
                        <option value="humo">Humo</option>
                        <option value="diseno1">Diseño mica</option>
                        <option value="popit">Pop it</option>
                    </select>
                </td>
                <td> <input type="text" name="cantidad[]" placeholder="cantidad" required> </td>
                <td class="eliminarTipo"><button class="btn btn-dark" value="Menos -"><i class="fas fa-minus-circle"></i></button></td>
            </tr>
        </table>
        <button id="adicionalTipo" name="adicional" type="button" class="btn btn-dark"> <i class="far fa-plus-square"></i> </button>

        <label for="">Modelo</label>
        <table class="mx-auto table-borderless form-linea mt-2"  id="tabla">
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