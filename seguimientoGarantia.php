<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php");
$id = $_GET['id'];
$query = "SELECT tg.PK_ticket_garantia, CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
tg.nombre_dueno, tg.telefono_dueno, vc.fecha_venta, tg.fecha_recepcion, tg.ticket_compra,
tg.caja_celular, tg.caja_celular, tg.accesorios_celular, tg.desbloqueado, tg.formateado, tg.descripcion_falla,
tg.observaciones,
vc.fecha_venta, vc.precio, vc.descuento, (vc.precio - vc.descuento) AS total, vc.PK_venta,
c.fecha_compra, c.ram, c.imei1, c.imei2, c.altan_compat
FROM tbl_ticket_garantia tg
INNER JOIN venta_celular vc ON vc.PK_venta = tg.FK_venta_celular
INNER JOIN celular c ON c.id_celular = vc.FK_celular
INNER JOIN marca m  ON c.FK_marca = m.id_marca
WHERE tg.PK_ticket_garantia = '$id';";

$resultado = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($resultado);
$id_venta = $fila["PK_venta"];
$modelo = $fila["modelo"];
$nombre_dueno = $fila["nombre_dueno"];
$telefono_dueno = $fila["telefono_dueno"];
$descripcion = $fila["descripcion_falla"];
$observaciones = $fila["observaciones"];
$fecha_venta = $fila["fecha_venta"];
$fecha_recepcion = $fila["fecha_recepcion"];
$ticket_compra = $fila["ticket_compra"];
$accesorios = $fila["accesorios_celular"];
$caja_celular = $fila["caja_celular"];
$desbloqueado = $fila["desbloqueado"];
$formateado = $fila["formateado"];
$fecha_venta = $fila["fecha_venta"];
$precio = $fila["precio"];
$descuento = $fila["descuento"];
$total = $fila["total"];
$fecha_compra = $fila["fecha_compra"];
$ram = $fila["ram"];
$imei1 = $fila["imei1"];
$imei2 = $fila["imei2"];
$altan = $fila["altan_compat"];

$querySolucion = "SELECT s.FK_soluciones, cs.nombre_soluciones, s.monto_rembolso, s.observaciones, s.FK_cambio,
c.FK_telefono_cambio, c.diferencia, c.monto_diferencia, c.cantidad_efectivo, c.especie,
CONCAT(m.marca, ' ', ce.modelo, ' ', ce.red, 'G ', ce.almacenamiento, ' gb') AS celular_cambio, 
ce.imei1
FROM rel_garantia_solucion rgs
INNER JOIN tbl_solucion s ON rgs.FK_solucion = s.PK_solucion
INNER JOIN cat_soluciones cs ON cs.PK_soluciones = s.FK_soluciones
LEFT JOIN tbl_cambio c ON s.FK_cambio = c.PK_cambio
LEFT JOIN celular ce ON ce.id_celular = c.FK_telefono_cambio
LEFT JOIN marca m ON m.id_marca = ce.FK_marca
WHERE fk_garantia = '$id'";

$resultado = mysqli_query($conn, $querySolucion);
$fila = mysqli_fetch_assoc($resultado);


function convertirBooleano($booleano)
{
    return $booleano == 1 ? "Si" : "No";
}

function diferencia($diferencia)
{
    switch ($diferencia) {
        case 0:
            return "Diferencia en contra de:";
        case 1:
            return "Diferencia a favor de:";
        case 2:
            return "Sin diferencia";

    }
}

?>

<div class="container">
    <h1>Articulos Apartados</h1>
    <div class="row">
        <div class="col-md-5">
            <div class="card col-md-12  p-3 align-self-start">
                <div class="row text-center">
                    <h4>
                        <?php echo $modelo ?>
                    </h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php echo $nombre_dueno ?> |
                            <?php echo $telefono_dueno ?>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Fecha de recepcion:
                        <?php echo $fecha_recepcion ?>
                    </p>
                </div>
                <div class="row">
                    <p>
                        <b>Detalle/ Falla:</b>
                        <?php echo $descripcion ?>
                    </p>
                    <p>
                        <b>Observaciones:</b>
                        <?php echo $observaciones ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Cuenta con ticket: <?php echo convertirBooleano($ticket_compra) ?> </p>
                    </div>
                    <div class="col-md-4">
                        <p>Viene con caja: <?php echo convertirBooleano($caja_celular) ?> </p>
                    </div>
                    <div class="col-md-4">
                        <p>Trae todos sus accesorios: <?php echo convertirBooleano($accesorios) ?> </p>
                    </div>
                    <div class="col-md-4">
                        <p>El celular viene sin contraseña: <?php echo convertirBooleano($desbloqueado) ?> </p>
                    </div>
                    <div class="col-md-4">
                        <p>El celular viene formateado: <?php echo convertirBooleano($formateado) ?> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 ml-5">
            <div class="card col-md-12  p-3 align-self-start">
                <?php if ($resultado && mysqli_num_rows($resultado) > 0) { ?>
                    <div class="row text-center">
                        <h3>
                            Solucion
                        </h3>
                    </div>
                    <?php
                    switch ($fila["FK_soluciones"]) {
                        case 1:
                        case 4: ?>
                            <h4 class="p-3 mb-2 bg-success text-white"><?php echo $fila["nombre_soluciones"] ?></h4>
                            <p><?php echo $fila["observaciones"] ?></p>
                            <?php
                            break;
                        case 2: ?>
                            <h4 class="p-3 mb-2 bg-info text-white"><?php echo $fila["nombre_soluciones"] ?></h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Telefono cambiado por:</p>
                                </div>
                                <div class="col-md-4">
                                    <p><?php echo $fila["celular_cambio"] ?> </p>
                                </div>
                                <div class="col-md-4">
                                    <p>IMEI: <?php echo $fila["imei1"] ?> </p>
                                </div>
                            </div>
                            <p><?php echo $fila["observaciones"] ?></p>
                            <?php
                            if ($fila["diferencia"] != 2) { ?>
                                <p><?php echo diferencia($fila["diferencia"]) . $fila["monto_diferencia"] ?></p>
                                <p>Cantidad en efectivo: <?php echo $fila["cantidad_efectivo"] ?></p>
                                <p>Especie: <?php echo $fila["especie"] ?></p>
                                <?php
                            } else { ?>
                                <p>Sin diferencia </p> <?php
                            }
                            break;
                        case 3:
                            ?>
                            <h4 class="p-3 mb-2 bg-warning text-white"><?php echo $fila["nombre_soluciones"] ?></h4>
                            <p>Monto rembolsado: <?php echo $fila["monto_rembolso"] ?></p>
                            <p><?php echo $fila["observaciones"] ?></p>
                        <?php
                    }
                    ?>
                    <?php

                } else { ?>
                    <div class="row text-center">
                        <h3>
                            Solucion
                        </h3>
                    </div>
                    <div class="row text-center">
                        <p>Aún no existe solucion para este garantia, seguimos trabajando en ello.</p>
                        <button type="button" class="text-center col-md-3 btn btn-primary" data-toggle="modal"
                            data-target="#miModal">
                            Agregar Solucion
                        </button>
                    </div>
                    <?php
                } ?>
            </div>
            <div class="card col-md-12  p-3 align-self-start">
                <div class="row text-center">
                    <h4>
                        Detalle de Venta
                    </h4>
                </div>
                <div class="row">
                    <p>
                        <b>Fecha de la Venta</b>
                        <?php echo $fecha_venta ?>
                    </p>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Precio de venta: <?php echo $precio ?> </p>
                        </div>
                        <div class="col-md-4">
                            <p>Descuento: <?php echo $descuento ?> </p>
                        </div>
                        <div class="col-md-4">
                            <p>Total: <?php echo $total ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12  p-3 align-self-start">
                <div class="row text-center">
                    <h5>
                        Informacion del Telefono
                    </h5>
                </div>
                <div class="row">
                    <p>
                        <b>Fecha de compra:</b>
                        <?php echo $fecha_compra ?>
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <p> <?php echo $modelo ?> + <?php echo $ram ?> ram </p>
                        </div>
                        <div class="col-md-6">
                            <p>Compatiblidad con Altan: <?php echo convertirBooleano($altan) ?> </p>
                        </div>
                        <div class="col-md-6">
                            <p>IMEI1: <?php echo $imei1 ?> </p>
                        </div>
                        <div class="col-md-6">
                            <p>IMEI2: <?php echo $imei2 ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registros/nuevaSolucion.php" method="POST" id="formulario"
                    class="col-md-12 align-self-start">
                    <div class="row text-center">
                        <h4>Solucion de Garantia</h4>
                    </div>
                    <input type="hidden" name="id_garantia" value="<?php echo $id ?>">
                    <input type="hidden" name="id_venta" value="<?php echo $id_venta ?>">
                    <div class="row">
                        <div class="col-12">
                            <label for="solucion" class="form-label">Seleccion:</label>
                            <select class="form-select" name="solucion" id="solucion">
                                <option value="0" disabled selected>Selecciona una solución</option>
                                <?php
                                $pos = "SELECT PK_soluciones, nombre_soluciones FROM cat_soluciones ORDER BY PK_soluciones ASC";
                                $resultado = mysqli_query($conn, $pos);
                                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                                    <option value="<?php echo $row["PK_soluciones"] ?>">
                                        <?php echo $row["nombre_soluciones"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12" id="contenedor-observaciones" style="display: none">
                            <div class="form-group">
                                <label for="descripcion">Observaciones:</label>
                                <textarea name="observaciones" class="form-control" id="observaciones" cols="30"
                                    rows="5" placeholder="Detalles de tuvo el telefono"></textarea>
                            </div>
                        </div>
                        <div class="col-12" id="contenedor-rembolso" style="display: none">
                            <label for="rombolso" class="form-label">Rembolso:</label>
                            <input class="form-control" type="number" name="rembolso" placeholder="Rembolso"
                                id="rembolso">
                        </div>
                        <div class="col-12" id="contenedor-imei" style="display: none">
                            <label for="imei" class="form-label">IMEI:</label>
                            <input class="form-control" type="text" name="imei" placeholder="IMEI del telefono a cambio"
                                id="imei">
                            <div id="result"></div>
                        </div>
                        <div class="col-md-12" id="contenedor-diferencia" style="display: none">
                            <div class="form-group">
                                <label for="">Diferencia de dinero:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diferencia" id="diferencia_favor"
                                        value="1">
                                    <label class="form-check-label" for="diferencia_favor">Positiva</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diferencia"
                                        id="diferencia_negativa" value="0">
                                    <label class="form-check-label" for="diferencia_negativa">Negativa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="diferencia" id="diferencia_nula"
                                        value="2">
                                    <label class="form-check-label" for="diferencia_nula">Sin diferencia</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="contenedor-monto-diferencia" style="display: none">
                            <label for="monto_diferencia" class="form-label">Monto Diferencia:</label>
                            <input class="form-control" type="number" name="monto_diferencia"
                                placeholder="Cantidad diferencia" id="monto_diferencia">
                        </div>
                        <div class="col-12" id="contenedor-cantidad-efectivo" style="display: none">
                            <label for="cantidad_efectivo" class="form-label">Cantidad en efectivo:</label>
                            <input class="form-control" type="number" name="cantidad_efectivo"
                                placeholder="Cantidad efectivo"  id="cantidad_efectivo">
                        </div>
                        <div class="col-md-12" id="contenedor-especie" style="display: none">
                            <div class="form-group">
                                <label for="especie">Especie:</label>
                                <textarea name="especie" class="form-control" id="especie" cols="30" rows="5"
                                    placeholder="Detallar diferencia en especie (audifonos, fundas, etc) si hubo"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="js/modalSoluciones.js"></script>
<script src="js/validaSoluciones.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<style>
    .negro {
        background: white;
    }
</style>