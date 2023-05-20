<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/celularesMensaje.php")
?>
<div class="container">
    <h1>Formulario de Teléfono</h1>
    <form action="registros/nuevoCelular.php" method="POST" id="formulario">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="marca">Marca:</label>
                    <select class="form-select" id="marca" name="marca">
                        <option value="0" disabled selected>Selecciona una marca </option>
                        <?php
                        $pos = "SELECT id_marca, marca FROM marca ORDER BY id_marca ASC";
                        $resultado = mysqli_query($conn, $pos);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $id_marca = $row["id_marca"] ?>
                            <option value="<?php echo $id_marca ?>"> <?php echo $row["marca"] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado">Estado:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado" id="nuevo" value="true" required>
                        <label class="form-check-label" for="nuevo">Nuevo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado" id="usado" value="false">
                        <label class="form-check-label" for="usado">Usado</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="almacenamiento">Almacenamiento (GB):</label>
                    <input type="number" class="form-control" id="almacenamiento" name="almacenamiento">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ram">RAM (GB):</label>
                    <input type="number" class="form-control" id="ram" name="ram">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="red">Red:</label>
                    <select class="form-select" id="red" name="red">
                        <option value="0" disabled selected>Selecciona una marca </option>
                        <option value="2">2G</option>
                        <option value="3">3G</option>
                        <option value="4">4G</option>
                        <option value="5">5G</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="imei1">IMEI 1:</label>
                    <input type="text" class="form-control" id="imei1" name="imei1"  maxlength="16" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="imei1">IMEI 2:</label>
                    <input type="text" class="form-control" id="imei2" name="imei2" maxlength="16">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="precioCompra">Precio de compra:</label>
                    <input type="number" class="form-control" id="precioCompra" name="precioCompra" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="precioCompra">Precio venta sugerido:</label>
                    <input type="number" class="form-control" id="precioSugerido" name="precioSugerido" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="fecha_compra">Fecha de Compra:</label>
                    <input type="date" class="form-control" id="fecha_compra" name="fecha_compra">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="precioCompra">Dias de Garantia:</label>
                    <input type="number" class="form-control" id="garantia" name="garantia" placeholder="Numero de dias">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-3">
                <button class="btn btn-dark">Guardar</button>
            </div>
        </div>
    </form>
</div>

<script src="js/validaCelular.js"></script>