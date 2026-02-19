<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php");
$id = $_GET['id'];
$query = "SELECT r.PK_reparacion, r.nombre_cliente, r.telefono_contacto,
m.marca, mo.nombre, r.servicio, r.presupuesto, r.abono, r.descripcion_problema,
r.contrasena_telefono, r.envio, r.estado,
r.fecha_notificacion, r.fecha_recepcion FROM tbl_reparacion r
INNER JOIN marca m ON m.id_marca = r.FK_marca
INNER JOIN modelos mo ON mo.id_modelo = r.FK_modelo
INNER JOIN cat_estado_reparacion e ON e.PK_estado_reparacion = r.estado
WHERE r.PK_reparacion = '$id';";

$resultado = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($resultado);

$folio = $fila["PK_reparacion"];
$nombre_cliente = $fila["nombre_cliente"];
$telefono_contacto = $fila["telefono_contacto"];
$marca = $fila["marca"];
$modelo = $fila["nombre"];
$servicio = $fila["servicio"];
$presupuesto = $fila["presupuesto"];
$abono = $fila["abono"];
$descripcion_problema = $fila["descripcion_problema"];
$contrasena_telefono = $fila["contrasena_telefono"];
$envio = $fila["envio"] == 1 ? 150 : 0;
$estado = $fila["estado"];
$fecha_notificacion = is_null($fila["fecha_notificacion"]) ? "Sin notificar" : $fila["fecha_notificacion"];
$fechaActual = new DateTime();
$dias_transcurridos = is_null($fila["fecha_notificacion"]) ? "Sin calculo" : $fila["fecha_notificacion"]->diff($fechaActual);;
$fecha_recepcion = $fila["fecha_recepcion"];




?>

<div class="container">
    <h1 class="text-center">Seguimiento de Telefono</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card col-md-12  p-3 align-self-start">
                <div class="row text-center">
                    <h4>
                        <?php echo $marca ?> <?php echo $modelo ?>
                    </h4>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <p>Servicio: <?php echo $servicio ?> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php echo $nombre_cliente ?> |
                            <?php echo $telefono_contacto ?>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Fecha de Recepcion:
                        <?php echo $fecha_recepcion ?>
                    </p>
                </div>

            </div>
            <form action="registros/nuevoPagoReparacion.php" method="POST" id="formulario"
                class="col-md-12 shadow p-3 mt-3 border align-self-start">
                <div class="row text-center">
                    <h4>Abonar</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="monto" class="form-label">Monto:</label>
                        <input class="form-control" type="number" name="monto" placeholder="Monto" required id="monto">
                        <input type="hidden" id="id_reparado" name="id_reparado" value="<?php echo $id ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center mt-3">
                        <button class="btn btn-dark">Abonar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-9 ml-5">
            <div class="card col-md-12  p-3 align-self-start mb-3">
                <div class="row text-center">
                    <h4>
                        Datos de Telefono
                    </h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Contraseña:
                            <?php echo $contrasena_telefono ?>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            Descripcion de la Falla: <?php echo $descripcion_problema ?>

                        </p>

                    </div>
                </div>
            </div>

            <div class="card col-md-12  p-3 align-self-start mb-3">
                <div class="row text-center">
                    <h4>
                        Datos de Telefono
                    </h4>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Presupuesto: $<?php echo number_format($presupuesto, 2) ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>Abono: $<?php echo number_format($abono, 2) ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>Envio: $<?php echo number_format($envio, 2) ?>
                        </p>
                    </div>
                    <div class="col-md-4 bg-info">
                        <p>Restante: $<?php echo number_format($presupuesto + $envio - $abono, 2) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-md-12  p-3 align-self-start">
                <div class="row text-center">
                    <h4>
                        Fechas
                    </h4>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Fecha de Recepcion:
                            <?php echo $fecha_recepcion ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>Fecha de Recepcion:
                            <?php echo $fecha_notificacion ?>
                        </p>
                    </div>
                     <div class="col-md-4">
                        <p>Dias Transcurridos:
                            <?php echo $dias_transcurridos ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .negro {
        background: white;
    }
</style>
<