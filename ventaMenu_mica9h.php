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
        <form action="registros/ventaMica9h.php" class="row g-3 mt-3">
            <h3 class="display-5 text-dark text-center font-weight-bold">Venta micas normales</h3>
            <div class="col-6">
                <label for="marca" class="form-label">Marca</label>
                <select class="form-select" name="marca" id="marca">
                    <option value="vacio">Selecciona la Marca</option>
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
            <div class="col-6">
                <label for="modelo" class="form-label">Modelo:</label>
                <select class="form-select" name="modelo" id="modelo">
                        
                </select>
            </div>
            <div class="col-4">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input class="form-control" type="number" name="cantidad" placeholder="Cantidad" required id="cantidad">
            </div>
            <div class="col-4">
                <label for="precio" class="form-label">Precio:</label>
                <input class="form-control" type="number" name="precio" placeholder="Precio" required id="precio">
            </div>
            <div class="col-4">
                <label for="descuento" class="form-label">Descuento:</label>
                <input class="form-control" type="number" name="descuento" placeholder="descuento" required id="precio">
            </div>
            
            <div class="col text-center">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>

<script src="js/select.js"></script>

<?php
    include("includes/footer.php")
?>