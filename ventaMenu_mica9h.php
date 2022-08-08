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
                    <select class="form-select" name="tipo" id="tipo">
                        <option value="">Mica HD</option>
                    </select>
                </td>
                <td class="col-3"> <input class="form-control" type="text" name="modelo[]" placeholder="Modelo" required> </td>
                <td class="col-3"> <input class="form-control" type="number" name="cantidad[]" placeholder="Cantidad" required></td>
                <td class="col-3"> <input class="form-control" type="number" name="precio[]" placeholder="Precio" required> </td>
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