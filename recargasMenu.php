<?php
include ("db.php");
include ("includes/header.php");
include ("mensajesExito/celularesMensaje.php")
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
                        <label for="imei">Numero:</label>
                        <input type="text" class="form-control" id="numero" name="numero" required placeholder="Numero">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="modelo">Monto:</label>
                        <input type="number" class="form-control" id="monto" name="monto"
                            placeholder="Monto de la recarga" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="tipo" class="form-label">Tipo de recarga:</label>
                        <select class="form-select" name="tipo" id="tipo">
                            <option value="1">Normal</option>
                            <option value="2">Paquete</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="datetime-local" class="form-control" id="fecha" name="fecha" placeholder="Fecha"
                            required>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar" required>
                    </div>
                </div>
            </div>
            <div class="table-responsive" style="max-height: 600px;">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo Recarga</th>
                            <th>Monto</th>
                            <th>Telefono</th>
                            <th>Fecha</th>                          
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

<script src="js/buscarRecargas.js"></script>