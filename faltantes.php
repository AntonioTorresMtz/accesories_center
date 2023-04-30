<?php
        include("db.php");
        include("includes/header.php");
        if(isset($_SESSION['exito_Faltante'])){
            echo "<script type='text/javascript'>Swal.fire(
                        'Nueva mica Curva!',
                        'Se ha guardado la mica exitosamente!',
                        'success'
                      )</script>";
                unset($_SESSION['exito_Faltante']);
        }
?>

    <div class="formulario">
        <div class="container form-faltantes">
                <form action="registros/faltante.php" method="POST" class="row g-3 mt-3">
                    <h3 class="display-5 text-dark text-center font-weight-bold">Anotar faltantes</h3>
                    <div class="col-12">
                        <label for="marca" class="form-label">Descripcion:</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="10" placeholder="Tipo - Modelo - Marca"></textarea>                
                    </div>

                    <div class="col text-center">
                        <input type="submit" value="Guardar" class="btn btn-dark">
                    </div>
                </form>
            </div>

        <div class="table-responsive tbl-faltantes">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Faltante</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        <?php
                            $query = "SELECT descripcion, fecha FROM faltantes ORDER BY fecha DESC";

                            $res = $conn->query($query);
                            while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                                echo "<tr> <td>" . $row['descripcion']. "</td>".
                                "<td>" . $row['fecha']. "</td>".
                                "</tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
    </div>

<?php
    include("includes/footer.php")
?>