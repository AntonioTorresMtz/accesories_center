<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php");
$id = $_GET['id'];
$query = "SELECT
e.nombre_estado,
producto,
precio,
nombre_cliente,
telefono,
cantidad_restante,
fecha_inicio,
DATEDIFF(DATE_ADD(fecha_inicio, INTERVAL 1 MONTH), CURDATE()) AS dias_restantes
FROM
tbl_apartado a
INNER JOIN cat_estado_apartado e ON e.PK_estado_apartado = a.FK_estado_apartado
WHERE
pk_apartado = '$id';";

$resultado = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($resultado);
$producto = $fila["producto"];
$nombre = $fila["nombre_cliente"];
$estado = $fila["nombre_estado"];
$fecha_inicio = $fila["fecha_inicio"];
$dias_restante = $fila["dias_restantes"];
$precio = $fila["precio"];
$restante = $fila["cantidad_restante"];
$telefono = $fila["telefono"];

?>

<div class="container">
    <h1>Articulos Apartados</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card col-md-12  p-3 align-self-start">
                <div class="row text-center">
                    <h4>
                        <?php echo $producto ?>
                    </h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php echo $nombre ?> |
                            <?php echo $telefono ?>
                        </p>                
                        <hr>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Primer abono:
                        <?php echo $fecha_inicio ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <?php echo $estado ?>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p>Dias restantes:
                            <?php echo $dias_restante ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Valor total:
                            <?php echo '$' . number_format($precio, 2, ".", ",") ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <p>Valor restante:
                                <?php echo '$' . number_format($restante, 2, ".", ",") ?>
                            </p>
                        </div>
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
                            <th>Fecha</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        <?php
                        $query = "SELECT fecha_pago, monto FROM tbl_pagos p
                        INNER JOIN rel_apartado_pago r ON r.FK_pago = p.PK_pago
                        INNER JOIN tbl_apartado a ON a.PK_apartado = r.FK_apartado
                        WHERE pk_apartado = '$id';";
                        $res = $conn->query($query);
                        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr> <td>" . $row['fecha_pago'] . "</td>" .
                                "<td> $" . number_format($row['monto'], 2, ".", ",") . "</td>" .
                                "</tr>";
                        }
                        ?>
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