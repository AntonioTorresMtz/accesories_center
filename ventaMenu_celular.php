<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/celularesMensaje.php")
    ?>

<div class="container">
    <h1>Teléfonos</h1>
    <div class="row">
        <div></div>
        <form action="registros/ventaCelular.php" method="POST" id="formulario"
            class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Vender celular</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="imei">IMEI:</label>
                        <input type="text" class="form-control" id="imei" name="imei" required
                            placeholder="IMEI1 o IMEI2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="modelo">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio"
                            placeholder="Precio sin descuento" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descuento">Descuento:</label>
                        <input type="number" class="form-control" id="descuento" name="descuento"
                            placeholder="Descuento en pesos">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mt-3">
                    <button class="btn btn-dark">Guardar</button>
                </div>
            </div>
        </form>
        <div class="col-md-9 ml-5">
            <div class="table-responsive" style="max-height: 600px;">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Almacenamiento</th>
                            <th>RAM</th>
                            <th>Red</th>
                            <th>IMEI 1</th>
                            <th>IMEI 2</th>
                            <th>Estado</th>
                            <th>Precio venta</th>
                        </tr>
                    </thead>
                    <tbody id="result">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .negro {
        background: white;
    }
</style>

<script src="js/buscarCelular.js"></script>