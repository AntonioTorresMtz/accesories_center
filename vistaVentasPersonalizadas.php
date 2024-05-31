<?php
include ("db.php");
include ("includes/header.php");
include ("mensajesExito/apartadosMensaje.php")
    ?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Venta Fundas Personalizadas</h1>
    </div>
    <div class="row">
        <div class="col-md-12 ml-5">
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
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Cantidad</th>                            
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

<script src="js/buscaPersonalizada.js"></script>