<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php")
    ?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Garantias</h1>
    </div>
    <div class="row">
        <div></div>
        <form action="registros/nuevaGarantia.php" method="POST" id="formulario"
            class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Crear nueva Garantia</h4>
            </div>
            <div class="col-12">
                <label for="marca" class="form-label">Venta celular:</label>
                <select class="form-select" name="venta_celular" id="venta_celular">
                    <option value="0" disabled selected>Selecciona la venta en garantia</option>
                    <?php
                    $pos = "SELECT pk_venta, CONCAT(pk_venta, '.- ', m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo
                    FROM venta_celular vc
                    INNER JOIN celular c ON c.id_celular = vc.FK_celular
                    INNER JOIN marca m ON m.id_marca = c.FK_marca
                    ORDER BY vc.fecha_venta DESC ;";
                    $resultado = mysqli_query($conn, $pos);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id_venta = $row["pk_venta"] ?>
                        <option value="<?php echo $id_venta ?>"> <?php echo $row["modelo"] ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre del cliente</label>
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required
                            placeholder="Nombre de cliente">
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcion">Problema:</label>
                    <textarea name="descripcion_falla" class="form-control" id="descripcion_falla" cols="30" rows="5"
                        placeholder="Detalla el problema / falla del telefono"></textarea>
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

            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcion">Observaciones:</label>
                    <textarea name="observaciones" class="form-control" id="observaciones" cols="30" rows="5"
                        placeholder="Describe observaciones que pueda tener el telefono"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Trae ticket:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ticket_compra" id="si_ticket" value="1"
                                required>
                            <label class="form-check-label" for="si_ticket">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ticket_compra" id="no_ticket" value="0">
                            <label class="form-check-label" for="no_ticket">No</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Viene con caja:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="caja" id="si_caja" value="1" required>
                            <label class="form-check-label" for="si_caja">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="caja" id="no_caja" value="0">
                            <label class="form-check-label" for="no_caja">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Viene con todos los accesorios:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="accesorios" id="si_accesorios" value="1"
                                required>
                            <label class="form-check-label" for="si_accesorios">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="accesorios" id="no_accesorios" value="0">
                            <label class="form-check-label" for="no_accesorios">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Viene sin contraseña:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contrasena" id="si_contrasena" value="1"
                                required>
                            <label class="form-check-label" for="si_contrasena">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contrasena" id="no_contrasena" value="0">
                            <label class="form-check-label" for="no_contrasena">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Viene formateado:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="formateado" id="si_formateado" value="1"
                                required>
                            <label class="form-check-label" for="si_formateado">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="formateado" id="no_formateado" value="0">
                            <label class="form-check-label" for="no_formateado">No</label>
                        </div>
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
                            <th>Telefono</th>
                            <th>Dueño</th>
                            <th>Telefono</th>
                            <th>Fecha de venta</th>
                            <th>Fecha de recepcion</th>
                            <th>Trae ticket</th>                        
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

<script src="js/buscarGarantia.js"></script>