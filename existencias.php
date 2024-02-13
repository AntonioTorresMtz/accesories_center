<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php")
    ?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Lista de existencias</h1>
    </div>
    <div class="row">
        <div class="col-md-12 ml-5">
            <div class="row">
                <div class="col-md-5">
                    <select class="form-select" name="producto" id="producto">
                        <option value="0" selected disabled>Selecciona una producto</option>
                        <option value="1">Mica normal</option>
                        <option value="2">Mica completa</option>
                        <option value="3">Mica privacidad</option>
                        <option value="4">Micas camara</option>
                        <option value="5">Micas curvas</option>
                        <option value="6">Protectores</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="number" class="form-control" id="maximo" name="maximo"
                            placeholder="Cantidad maxima" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" id="btnBuscar" value="buscar" name="buscar"
                        onclick="buscar()">Buscar</button>
                </div>
            </div>
            <div class="table-responsive" style="max-height: 600px;">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Modelos</th>
                            <th>Cantidad</th>
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

<script src="js/buscarExistencias.js"></script>