<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/apartadosMensaje.php");

if (isset($_POST['buscar'])) {
    $inicio = $_POST["fechaInicio"];
    $fin = $_POST["fechaFinal"];
    $fin = date('Y-m-d', strtotime($fin . ' +1 day'));

    $_SESSION['fechaInicio'] = $inicio;
    $_SESSION['fechaFinal'] = $fin;
}

?>

<div class="container">
    <div>
        <h1 class="text-center m-4">Reportes</h1>
    </div>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="row align-items-end">
                <div class="col-5">
                    <div class="form-group">
                        <label for="fechaInicio">Inicio:</label>
                        <input type="date" class="form-control" id="fechaInicio" placeholder="Inicio"
                            name="fechaInicio">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="fechaFinal">Final:</label>
                        <input type="date" class="form-control" id="fechaFinal" placeholder="Final" name="fechaFinal">
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary" id="btnBuscar" value="buscar"
                        name="buscar">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="col-md-12 shadow p-3 mt-3 border align-self-start">
                <div class="row text-center">
                    <h4>Recargas</h4>
                    <?php
                    if (isset($_POST['buscar'])) {
                        $inicio = $_POST["fechaInicio"];
                        $fin = $_POST["fechaFinal"];

                        if (!empty($inicio) && !empty($fin)) {
                            // Si se ingresaron ambas fechas
                            $fin = date('Y-m-d', strtotime($fin . ' +1 day'));
                            $query = "SELECT SUM(monto) as ventas FROM tbl_recargas WHERE DATE(fecha_insercion) BETWEEN '$inicio' AND '$fin'";
                            $serviosSuma = "SELECT SUM(cantidad) as total FROM tbl_servicios WHERE DATE(fecha_plataforma) BETWEEN '$inicio' AND '$fin'";
                            $planesSuma = "SELECT SUM(monto) AS ventas FROM tbl_planes WHERE DATE(fecha) BETWEEN '$inicio' AND '$fin'";
                            $pagosSuma = "SELECT SUM(monto) AS ventas FROM tbl_pagos WHERE DATE(fecha_pago)  BETWEEN '$inicio' AND '$fin'";
                        } else {
                            // Si no se ingresaron fechas, mostrar solo el día actual
                            $query = "SELECT SUM(monto) as ventas FROM tbl_recargas WHERE DATE(fecha_insercion) = CURDATE()";
                            $serviosSuma = "SELECT SUM(cantidad) as total FROM tbl_servicios WHERE DATE(fecha_plataforma) = CURDATE();";
                            $planesSuma = "SELECT SUM(monto) AS ventas FROM tbl_planes WHERE CURDATE() = DATE(fecha);";
                            $pagosSuma = "SELECT SUM(monto) AS ventas FROM tbl_pagos WHERE CURDATE() = DATE(fecha_pago);";
                        }
                    } else {
                        // Primera carga sin búsqueda
                        $query = "SELECT SUM(monto) as ventas FROM tbl_recargas WHERE DATE(fecha_insercion) = CURDATE()";
                        $serviosSuma = "SELECT SUM(cantidad) as total FROM tbl_servicios WHERE DATE(fecha_plataforma) = CURDATE();";
                        $planesSuma = "SELECT SUM(monto) AS ventas FROM tbl_planes WHERE CURDATE() = DATE(fecha);";
                        $pagosSuma = "SELECT SUM(monto) AS ventas FROM tbl_pagos WHERE CURDATE() = DATE(fecha_pago);";
                    }


                    $res = $connRecargas->query($query);
                    $row = $res->fetch_array(MYSQLI_ASSOC);
                    echo '<p> $' . $row['ventas'] . '</p>';
                    ?>
                </div>
            </div>

            <div class="col-md-12 shadow p-3 mt-3 border align-self-start">
                <div class="row text-center">
                    <h4>Servicios</h4>
                    <?php
                    $res = $connRecargas->query($serviosSuma);
                    $row = $res->fetch_array(MYSQLI_ASSOC);
                    echo '<p> $' . $row['total'] . '</p>';
                    ?>
                </div>
            </div>

            <div class="col-md-12 shadow p-3 mt-3 border align-self-start">
                <div class="row text-center">
                    <h4>Planes Telcel</h4>
                    <?php
                    $res = $conn->query($planesSuma);
                    $row = $res->fetch_array(MYSQLI_ASSOC);
                    echo '<p> $' . $row['ventas'] . '</p>';
                    ?>
                </div>
            </div>

            <div class="col-md-12 shadow p-3 mt-3 border align-self-start">
                <div class="row text-center">
                    <h4>Pagos Apartados</h4>
                    <?php
                    $res = $conn->query($pagosSuma);
                    $row = $res->fetch_array(MYSQLI_ASSOC);
                    echo '<p> $' . $row['ventas'] . '</p>';
                    ?>
                </div>
            </div>

        </div>

        <div class="col-md-9 ml-5">
            <div class="col-md-12 text-end">
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
                                <th>Producto</th>
                                <th>Referencia</th>
                                <th>Monto</th>
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
                    console.log("Se camnbio");
                    const tipo = e.target.value;
                    // Ocultar todas las tablas
                    document.querySelectorAll('.tabla').forEach(t => t.classList.add('d-none'));
                    // Mostrar solo la seleccionada
                    document.getElementById(`tabla-${tipo}`).classList.remove('d-none');
                });
            });
        });
    </script>