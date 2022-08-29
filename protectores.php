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

<div class="container">
    <form action="registros/nuevoProtector.php" method="POST" class="row g-3 mt-3">
        <h3 class="display-5 text-dark text-center font-weight-bold">Protector Nuevo</h3>
        <div class="col-6">
            <label for="marca" class="form-label">Marca:</label>
            <select name="marca" id="marca" class="form-select">
                <option value="1" disabled selected>Selecciona una marca</option>
                <option value="Iphone">Iphone</option>
                <option value="Samsung">Samsung</option>
                <option value="Motorola">Motorola</option>
                <option value="Huawei">Huawei</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="OPPO">OPPO</option>
                <option value="Alcatel">Alcatel</option>
                <option value="LG">LG</option>
                <option value="ZTE">ZTE</option>
            </select>
        </div>

        <div class="col-6">
        <label for="largo" class="form-label">Posicion:</label>
            <select name="posicion" id="posicion" class="form-select">
                <?php
                    $pos="SELECT id_posicion, nombre FROM posicion WHERE muro = '3' ORDER BY nombre ASC";
                    $resultado = mysqli_query($conn, $pos);
                    while($row = mysqli_fetch_assoc($resultado)) {
                        $id_posicion = $row["id_posicion"]?>
                        <option value="<?php echo $id_posicion?>"> <?php echo $row["nombre"]?> </option>
                <?php  } ?>
                
            </select>
        </div>
        <div class="col-12 text-centar">
            <label for="">Tipo:</label>
        </div>
        <table class="table-borderless form-linea p-3"  id="tablaTipo">
            <tr class="fila-fija">
                <td> 
                    <select name="tipo[]" id="tipo" class="form-select col-6" required>
                        <option value="0" disabled selected>--Selecciona tipo de funda --</option>
                        <?php
                            $pos="SELECT id_nombreTipo, nombre FROM nombre_tipo_protector";
                            $resultado = mysqli_query($conn, $pos);
                            while($row = mysqli_fetch_assoc($resultado)) {
                                $id_nombre = $row["id_nombreTipo"]?>
                                <option value="<?php echo $id_nombre?>"> <?php echo $row["nombre"]?> </option>
                        <?php  } ?>
                    </select>
                </td>
                <td> <input type="text" name="cantidad[]" placeholder="cantidad" class="form-control col-6" required> </td>
                <td class="eliminarTipo"><button class="btn btn-dark" value="Menos -"><i class="fas fa-minus-circle"></i></button></td>
            </tr>
        </table>
        <div class="col text-center">
            <label class="form-label" for="">Agregar tipo de funda</label>
            <button id="adicionalTipo" name="adicional" type="button" class="btn btn-dark"> <i class="far fa-plus-square"></i> </button>
        </div>
        <div class="col-12 text-centar">
            <label for="">Modelo:</label>
        </div>
        <table class="table-borderless form-linea p-3"  id="tabla">
            <tr class="fila-fija">
                
                <td> <select type="text" name="modelo[]" id="modelo" class="col form-select" placeholder="Modelo:" required> </select> </td>
                <td class="eliminar"><button class="btn btn-dark" value="Menos -"><i class="fas fa-minus-circle"></i></button></td>
            </tr>
        </table>
        <div class="col text-center">
            <label class="form-label" for="">Agregar tipo de modelo</label>
            <button id="adicional" name="adicional" type="button" class="btn btn-dark"> <i class="far fa-plus-square"></i> </button>
        </div>
        <input type="submit" value="Guardar" class="btn btn-dark">
    </form>        
</div>

<script src="js/selectModelo.js"></script>  
<?php
    include("includes/footer.php")
?>