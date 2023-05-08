<?php
include("db.php");
include("includes/header.php");
include("mensajesExito/fusiones.php")
    ?>
<div class="container">
    <form action="registros/fusionar.php" method="POST" class="mt-3">
        <h3 class="display-5 text-dark text-center font-weight-bold">Fusionar Modelos</h3>
        <select class="form-select mb-3" name="producto" id="producto">
            <option value="0" selected disabled>Selecciona una producto</option>
            <option value="1">Mica normal</option>
            <option value="2">Mica completa</option>
            <option value="3">Mica privacidad</option>
            <option value="4">Micas camara</option>
            <option value="5">Micas curvas</option>
        </select>
        <div class="row g-3">
            <div id="modelo1" class="col-6">
                <h4>Modelo a conservar</h4>
                <div class="form-group">
                    <label for="marca1" class="form-label">Marca</label>
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
            </div>
            <div id="modelo3" class="col-6">
                <h4>Modelo a Fusionado </h4>
                <div class="form-group">
                    <label for="marca2" class="form-label">Marca</label>
                    <select class="form-select" name="marca2" id="marca2">
                        <option value="1" disabled selected>Selecciona una marca</option>
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
                    <label for="modelo2" class="form-label">Modelo:</label>
                    <select class="form-select" name="modelo2" id="modelo2">
                    </select>
                </div>
            </div>
        </div>
        <div class="col p-3 text-center">
            <input type="submit" value="Guardar" class="btn btn-dark">
        </div>
    </form>
</div>


<div class="container mt-3" id="compatibles">

</div>

<script src="js/compatibles.js"></script>

<?php
include("includes/footer.php")
    ?>