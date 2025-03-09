<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/desfusiones.php")
    ?>
<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="registros/desfusionar.php" method="POST" class="col-12 col-sm-12 col-md-10 col-lg-6 shadow p-3 align-self-start"
            id="formulario">
            <div class="row text-center">
                <h2>Desfusionar modelos</h2>
            </div>

            <div class="col form-group">
                <label for="producto" class="form-label">Producto:</label>
                <select class="form-select mb-3" name="producto" id="producto">
                    <option value="0" selected disabled>Selecciona una producto</option>
                    <option value="1">Mica normal</option>
                    <option value="2">Mica completa</option>
                    <option value="3">Mica privacidad</option>
                    <option value="4">Micas camara</option>
                    <option value="5">Micas curvas</option>
                    <option value="6">Protectores</option>
                </select>
            </div>
            <div class="row g-3">
                <div id="modelo1" class="col-6 linea">
                    <div class="row text-center">
                        <h4>Modelo a conservar</h4>
                    </div>

                    <div class="form-group">
                        <label for="marca1" class="form-label">Marca:</label>
                        <select class="form-select" name="marca" id="marca">
                            <option value="1" selected>Selecciona una marca</option>
                            <?php
                            $pos = "SELECT id_marca, marca FROM marca ORDER BY id_marca ASC";
                            $resultado = mysqli_query($conn, $pos);
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $id_marca = $row["id_marca"] ?>
                                <option value="<?php echo $id_marca ?>"> <?php echo $row["marca"] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelo1" class="form-label">Modelo:</label>
                        <select class="form-select" name="modelo" id="modelo">
                        </select>
                    </div>
                    <div class="form-group" id="contenedor_cantidades1">
                        <label for="cantidad2" class="form-label">Cantidad:</label>
                        <input class="form-control" type="number" name="cantidad2" placeholder="Cantidad" required
                            id="cantidad2">
                    </div>
                    <div class="form-group" id="cantidades">

                    </div>
                </div>
                <div id="modelo3" class="col-6">
                    <div class="row text-center">
                        <h4>Modelo separado</h4>
                    </div>

                    <div class="form-group">
                        <label for="modelo2" class="form-label">Modelo:</label>
                        <select class="form-select" name="modelo2" id="modelo2">
                        </select>
                    </div>
                    <div class="form-group" id="contenedor_cantidades2">
                        <label for="cantidad2" class="form-label">Cantidad:</label>
                        <input class="form-control" type="number" name="cantidad1" placeholder="Cantidad" required
                            id="cantidad1">
                    </div>
                    <div class="form-group" id="cantidades2">

                    </div>
                </div>
            </div>
            <div class="col p-3 text-center">
                <input type="submit" value="Guardar" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>


<div class="container mt-3" id="compatibles">

</div>

<script src="js/dividir.js"></script>
<script src="js/validaDesfusion.js"></script>

<?php
include("includes/footer.php");
?>