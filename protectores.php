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
    if(isset($_SESSION['protector_repetido'])){
        echo "<script type='text/javascript'>Swal.fire(
                    'Modelo repetido!',
                    'El modelo ya existe en el inventario, intenta actualizar su cantidad!',
                    'error'
                  )</script>";
            unset($_SESSION['protector_repetido']);
    }
    if(isset($_SESSION['protectores_repetido'])){
        echo "<script type='text/javascript'>Swal.fire(
                    'Modelos repetidos!',
                    'Algún modelo ya existe en el inventario, intenta actualizar su cantidad!',
                    'error'
                  )</script>";
            unset($_SESSION['protectores_repetido']);
    }
?>

<div class="container">
    <form action="registros/nuevoProtector.php" method="POST" class="row g-3 mt-3" id="formulario">
        <h3 class="display-5 text-dark text-center font-weight-bold">Protector Nuevo</h3>
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
                <label class="form-label" for="largo">Muro:</label>
                <select name="muro" id="muro" class="form-select">
                    <option value="0" disabled selected>Selecciona un muro</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="col-4">
                <label for="posicion" class="form-label">Posicion:</label>
                <select name="posicion" id="posicion" class="form-select">    
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
                <td> <input type="number" name="cantidad[]" placeholder="Cantidad" class="form-control col-6" required> </td>
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

<script src="js/agregarModelo.js"></script>
<script src="js/selectPosicion.js"></script>
<script src="js/valida_modelos.js"></script>

<?php
    include("includes/footer.php")
?>