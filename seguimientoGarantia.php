<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php");
$id = $_GET['id'];
$query = "SELECT tg.PK_ticket_garantia, CONCAT(m.marca, ' ', c.modelo, ' ', c.red, 'G ', c.almacenamiento, ' gb') AS modelo,
tg.nombre_dueno, tg.telefono_dueno, vc.fecha_venta, tg.fecha_recepcion, tg.ticket_compra,
tg.caja_celular, tg.caja_celular, tg.accesorios_celular, tg.desbloqueado, tg.formateado, tg.descripcion_falla,
tg.observaciones,
vc.fecha_venta, vc.precio, vc.descuento, (vc.precio - vc.descuento) AS total,
c.fecha_compra, c.ram, c.imei1, c.imei2, c.altan_compat
FROM tbl_ticket_garantia tg
INNER JOIN venta_celular vc ON vc.PK_venta = tg.FK_venta_celular
INNER JOIN celular c ON c.id_celular = vc.FK_celular
INNER JOIN marca m  ON c.FK_marca = m.id_marca
WHERE tg.PK_ticket_garantia = '$id';";

$resultado = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($resultado);
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
function convertirBooleano($booleano)
{
    return $booleano == 1 ? "Si" : "No";
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
            <form action="registros/nuevoAbono.php" method="POST" id="formulario"
                class="col-md-12 shadow p-3 mt-3 border align-self-start">
                <div class="row text-center">
                    <h4>Abonar</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="monto" class="form-label">Monto:</label>
                        <input class="form-control" type="number" name="monto" placeholder="Monto" required id="monto">
                        <input type="hidden" id="id_apartado" name="id_apartado" value="<?php echo $id ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center mt-3">
                        <button class="btn btn-dark">Abonar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-7 ml-5">
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

<style>
    .negro {
        background: white;
    }
</style>