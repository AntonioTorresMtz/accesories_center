<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php")
    ?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Articulos apartados</h1>
    </div>
    <div class="row">
        <div></div>
        <form action="registros/nuevoApartado.php" method="POST" id="formulario"
            class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Apartar nuevo</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required
                            placeholder="Nombre de cliente">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Telefono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required
                            placeholder="Telefono de contacto">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="producto">Producto:</label>
                        <input type="text" class="form-control" id="producto" name="producto"
                            placeholder="Nombre del articulo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="modelo">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio"
                            placeholder="Precio del articulo" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="plazo">Abono:</label>
                        <input type="number" class="form-control" id="plazo" name="abono" placeholder="Monto a abonar"
                            required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="plazo">Dias de plazo:</label>
                        <input type="number" class="form-control" id="plazo" name="plazo"
                            placeholder="Dias de plazo para liquidar" required>
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
                            <th>Estado</th>
                            <th>Producto</th>
                            <th>Valor total</th>
                            <th>Tiempo de apartado</th>
                            <th>Cliente</th>
                            <th>Valor restante</th>
                            <th>Fecha</th>
                            <th>Detalles</th>
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

<script src="js/buscarApartado.js"></script>