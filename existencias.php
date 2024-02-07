<?php
include("includes/header.php");
include("db.php")
    ?>
<div class="container mt-4 text-center">
    <h1>Lista de Micas con menos de 5</h1>
</div>
<div class="row justify-content-center mt-3">
    <form action="registros/existenciasProtectores.php" method="POST" class="col-md-3 shadow p-3 align-self-start"
        id="formulario">
        <div class="col text-center">Generar PDF de Existencias</div>
        <div class="col text-center mt-2">
            <input type="submit" value="Fundas" class="btn btn-dark">
        </div>
    </form>
</div>
<div class="tablas_existencias">
    <div class="container existencias">
        <h4 class="text-center">Micas normales</h4>
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    $query = "SELECT m.marca, a.nombre, c.cantidad FROM modelos a 
                        INNER JOIN nombre_mica9h b ON b.nombre_modelo = a.id_modelo
                        INNER JOIN micas9h c ON c.id_mica9h = b.id_mica9h
                        INNER JOIN marca m ON m.id_marca = c.marca
                        WHERE c.cantidad <= 5";

                    $res = $conn->query($query);
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr> <td>" . $row['marca'] . "</td>" .
                            "<td>" . $row['nombre'] . "</td>" .
                            "<td>" . $row['cantidad'] . "</td>" .
                            "</tr>";

                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container existencias">
        <h4 class="text-center">Micas completas</h4>
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    $query = "SELECT m.marca, a.nombre, c.cantidad FROM modelos a 
                        INNER JOIN nombre b ON b.nombre_modelo = a.id_modelo
                        INNER JOIN micas9d c ON c.id_mica9d = b.id_mica
                        INNER JOIN marca m ON m.id_marca = c.marca
                        WHERE c.cantidad <= 5";

                    $res = $conn->query($query);
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr> <td>" . $row['marca'] . "</td>" .
                            "<td>" . $row['nombre'] . "</td>" .
                            "<td>" . $row['cantidad'] . "</td>" .
                            "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container existencias">
        <h4 class="text-center">Micas privacidad</h4>
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    $query = "SELECT m.marca, a.nombre, c.cantidad FROM modelos a 
                        INNER JOIN nombre_mica100d b ON b.nombre_modelo = a.id_modelo
                        INNER JOIN micas100d c ON c.id_mica100d = b.id_mica100d
                        INNER JOIN marca m ON m.id_marca = c.marca
                        WHERE c.cantidad <= 5";

                    $res = $conn->query($query);
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr> <td>" . $row['marca'] . "</td>" .
                            "<td>" . $row['nombre'] . "</td>" .
                            "<td>" . $row['cantidad'] . "</td>" .
                            "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container existencias">
        <h4 class="text-center">Micas camara</h4>
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    $query = "SELECT m.marca, a.nombre, c.cantidad FROM modelos a 
                        INNER JOIN nombre_micacamara b ON b.modelo = a.id_modelo
                        INNER JOIN micas_camara c ON c.id_micaCamara = b.id_micaCamara
                        INNER JOIN marca m ON m.id_marca = c.marca
                        WHERE c.cantidad <= 5";

                    $res = $conn->query($query);
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr> <td>" . $row['marca'] . "</td>" .
                            "<td>" . $row['nombre'] . "</td>" .
                            "<td>" . $row['cantidad'] . "</td>" .
                            "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container existencias">
        <h4 class="text-center">Micas Curvas</h4>
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="result">
                    <?php
                    $query = "SELECT m.marca, a.nombre, c.cantidad FROM modelos a 
                        INNER JOIN nombre_micacurva b ON b.nombre_modelo = a.id_modelo
                        INNER JOIN micascurva c ON c.id_micaCurva = b.id_micaCurva
                        INNER JOIN marca m ON m.id_marca = c.marca
                        WHERE c.cantidad <= 5";

                    $res = $conn->query($query);
                    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr> <td>" . $row['marca'] . "</td>" .
                            "<td>" . $row['nombre'] . "</td>" .
                            "<td>" . $row['cantidad'] . "</td>" .
                            "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<?php
include("includes/footer.php");
?>