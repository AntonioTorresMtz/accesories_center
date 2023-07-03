<?php
include("db.php");
include("includes/header.php");
if (isset($_SESSION['exito_Faltante'])) {
    echo "<script type='text/javascript'>Swal.fire(
                    'Nueva mica Curva!',
                    'Se ha guardado la mica exitosamente!',
                    'success'
                  )</script>";
    unset($_SESSION['exito_Faltante']);
}
?>
<div class="container">
    <h1>Teléfonos</h1>
    <div class="row">
        <div></div>
        <form action="registros/faltante.php" method="POST" id="formulario"
            class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Notas para faltantes</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcion">Anotacion:</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="10"
                            placeholder="Tipo - Modelo - Marca"></textarea>
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
            <div class="table-responsive" style="max-height: 600px;">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Anotacion</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        <?php
                        $query = "SELECT descripcion, fecha FROM faltantes ORDER BY fecha DESC";
                        $res = $conn->query($query);
                        while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr> <td>" . $row['descripcion'] . "</td>" .
                                "<td>" . $row['fecha'] . "</td>" .
                                "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php")
    ?>