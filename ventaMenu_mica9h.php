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
    <form action="" class="row mt-3 g-3">
        <table class="table-borderless form-linea p-3"  id="tabla">
            <label for="">Modelo:</label>
            <tr class="fila-fija">
                <td class="col-3">
                    <label for="producto" class="form-label">Producto</label>
                    <select class="form-select" name="producto[]" id="producto">
                        <option value="vacio">--Selecciona Producto--</option>
                        <option value="9h">Mica Normal</option>
                        <option value="9d">Mica Completa</option>
                        <option value="privacidad">Mica Privacidad</option>
                        <option value="curva">Mica curva</option>
                    </select>
                </td>
                <td class="col-3"> 
                    <label for="modelo" class="form-label">Modelo:</label>
                    <select class="form-select" name="modelo[]" id="modelo">
                        
                    </select>
                </td>
                <td class="col-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input class="form-control" type="number" name="cantidad[]" placeholder="Cantidad" required id="cantidad">
                </td>
                <td class="col-3"> 
                    <label for="precio" class="form-label">Precio:</label>
                    <input class="form-control" type="number" name="precio[]" placeholder="Precio" required>
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

<script src="js/select.js"></script>

<?php
    include("includes/footer.php")
?>