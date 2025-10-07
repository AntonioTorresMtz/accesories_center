<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php")
?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Recargas Telefonicas</h1>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="col-md-12 shadow p-3 mt-3 border align-self-start">
                <div class="row text-center">
                    <h4>Ventas del Dia</h4>
                    <?php
                    $query = "SELECT SUM(monto) as ventas FROM tbl_recargas WHERE 
                    CURDATE() = DATE(fecha_insercion);";

                    $res = $connRecargas->query($query);
                    $row = $res->fetch_array(MYSQLI_ASSOC);
                    echo '<p> $' . $row['ventas'] . '</p>';
                    ?>
                </div>
            </div>
            <form action="registros/nuevaRecarga.php" method="POST" id="formulario"
                class="col-md-12 shadow p-3 align-self-start">
                <div class="row text-center">
                    <h4>Insertar Recarga</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="imei">Numero:</label>
                            <input type="text" class="form-control" id="numero" name="numero" required
                                placeholder="Numero">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="imei">Operador:</label>
                            <input type="text" class="form-control" id="operador" name="operador" required
                                placeholder="Compañia">
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
                                <option value="Paquete">Paquete</option>
                                <option value="Normal">Normal</option>
                                <option value="Internet">Internet</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="datetime-local" class="form-control" id="fecha" name="fecha"
                                placeholder="Fecha" required>
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

        <div class="col-md-9 ml-5">
            <div class="col-md-6 text-end">
                <div class="btn-group" role="group" aria-label="Tipo de tabla">
                    <input type="radio" class="btn-check" name="tablaTipo" id="recargas" value="recargas" checked>
                    <label class="btn btn-outline-dark" for="recargas">Recargas</label>

                    <input type="radio" class="btn-check" name="tablaTipo" id="servicios" value="paquetes">
                    <label class="btn btn-outline-dark" for="paquetes">Servicios</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar" required>
                    </div>
                </div>
            </div>
            <div class="table-responsive tabla" id="tabla-recargas" style="max-height: 600px;">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo Recarga</th>
                            <th>Monto</th>
                            <th>Compañia</th>
                            <th>Telefono</th>
                            <th>Fecha</th>
                            <th>Reimprimir Ticket</th>
                        </tr>
                    </thead>
                    <tbody id="result">

                    </tbody>
                </table>
            </div>

            <div class="table-responsive tabla d-none" id="tabla-servicios" style="max-height: 600px;">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo Recarga</th>
                            <th>Monto</th>
                            <th>Compañia</th>
                            <th>Telefono</th>
                            <th>Fecha</th>
                            <th>Reimprimir Ticket</th>
                        </tr>
                    </thead>
                    <tbody id="resultSer">

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
<script src="js/buscarServicio.js"></script>
<script src="js/reimprimirRecarga.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const radios = document.querySelectorAll('input[name="tablaTipo"]');
    radios.forEach(radio => {
        radio.addEventListener('change', (e) => {
            const tipo = e.target.value;
            // Ocultar todas las tablas
            document.querySelectorAll('.tabla').forEach(t => t.classList.add('d-none'));
            // Mostrar solo la seleccionada
            document.getElementById(`tabla-${tipo}`).classList.remove('d-none');
        });
    });
});
</script>