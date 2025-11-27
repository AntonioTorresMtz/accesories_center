<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php")
    ?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Reparaciones</h1>
    </div>
    <div class="row">
        <form action="registros/nuevaReparacion.php" method="POST" id="formulario"
            class="col-md-3 shadow p-3 align-self-start mb-4">
            <div class="row text-center">
                <h4>Crear Recibo</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required
                            placeholder="Nombre de cliente">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Telefono:</label>
                        <input type="text" class="form-control" pattern="\d{10}" id="telefono" name="telefono"
                            placeholder="Telefono de contacto">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="marca" class="form-label">Marca:</label>
                    <select name="marca" id="marca" class="form-select">
                        <option value="0" selected disabled>Selecciona una marca</option>
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
            <div class="col-12">
                <label for="modelo" class="form-label">Modelo:</label>
                <select class="form-select" name="modelo" id="modelo">
                </select>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombre">Servicio:</label>
                    <input type="text" class="form-control" id="servicio" name="servicio" required
                        placeholder="Servicio a realizar">
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Presupuesto:</label>
                <input type="number" class="form-control" id="presupuesto" name="presupuesto" required
                    placeholder="Costo aproximado">
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombre">Abono:</label>
                    <input type="number" class="form-control" id="abono" name="abono" required placeholder="Abono">
                </div>
            </div>
            <div class="col-12">
                <label for="marca" class="form-label">Envio:</label>
                <select name="envio" id="envio" class="form-select">
                    <option value="0" selected>No</option>                                                        
                    <option value="1">Si</option>
                </select>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion del Problema:</label>
                    <textarea name="observaciones" class="form-control" id="descripcion_problema" cols="30" rows="5"
                        placeholder="Cuales problemas tiene el problema"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombre">Contraseña:</label>
                    <input type="text" class="form-control" id="contrasena" name="contrasena"
                        placeholder="Contraseña del Telefono">
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
                            <th>Servicio</th>
                            <th>Cliente</th>
                            <th>Telefono</th>
                            <th>Presupuesto</th>
                            <th>Abono</th>
                            <th>Contrasena</th>
                            <th>Fecha de recepcion</th>
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

<script src="js/agregarModelo.js"></script>
<script src="js/buscarReparacion.js"></script>