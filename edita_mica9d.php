<?php
include('db.php');
include("includes/header.php");

$id = $_GET['id'];
//echo $id;

$query = "SELECT m.marca as name_marca, a.marca, a.notas, a.ancho, a.largo, a.cantidad, a.posicion, p.nombre as name_posicion, p.muro
FROM micas9d a
INNER JOIN marca m ON m.id_marca = a.marca
INNER JOIN posicion p ON p.id_posicion = a.posicion
WHERE id_mica9d = '$id'";
$resultado = mysqli_query($conn, $query);

$fila = mysqli_fetch_assoc($resultado);
$marca = $fila["marca"];
$marca_name = $fila["name_marca"];
$ancho = $fila["ancho"];
$largo = $fila["largo"];
$cantidad = $fila["cantidad"];
$posicion = $fila["posicion"];
$posicion_name = $fila["name_posicion"];
$notas = $fila["notas"];
$muro = $fila["muro"];


?>

<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="editar/e_general9d.php" method="POST"
            class="col-12 col-sm-8 col-md-6 col-lg-3 mx-auto shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Modificar mica completa</h4>
            </div>

            <div class="col-12">
                <label for="boton" class="form-label">Compatibles:</label>
                <?php
                $name = "";
                $names = "SELECT m.nombre, m.id_modelo FROM modelos m
                INNER JOIN nombre a ON a.nombre_modelo = m.id_modelo
                INNER JOIN micas9d b ON a.id_mica = b.id_mica9d
                WHERE b.id_mica9d = '$id'";

                $resultado = mysqli_query($conn, $names);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $name = $name . $row["nombre"] . ", "; ?>
                <?php }
                $name = rtrim($name, ", ");
                ?>

                <p>
                    <?php echo $name ?>
                </p>

            </div>

            <div class="row">
                <div class="col-12">
                    <label for="notas" class="form-label">Notas:</label>
                    <textarea name="notas" id="notas" class="form-control"
                        maxlength="200"><?php echo $notas ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label" for="largo">Muro:</label>
                    <select name="muro" id="muro" class="form-select">
                        <option value="<?php echo $muro ?>" selected> <?php echo $muro ?> </option>
                        <?php
                        $muro = "SELECT DISTINCT muro FROM posicion;";
                        $resultado = mysqli_query($conn, $muro);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $muro1 = $row["muro"] ?>
                            <option value="<?php echo $muro1 ?>"> <?php echo $row["muro"] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-6">
                    <label for="posicion" class="form-label">Posicion:</label>
                    <select name="posicion" id="posicion" class="form-select">
                        <option value="<?php echo $posicion ?>" selected> <?php echo $posicion_name ?> </option>

                    </select>
                </div>

            </div>
            <div class="col">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" name="cantidad" step="1" id="cantidad" placeholder="Cantidad" class="form-control"
                    value="<?php echo $cantidad ?>" required>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="ancho" class="form-label">Ancho:</label>
                    <input type="number" name="ancho" step="any" id="ancho" class="form-control"
                        value="<?php echo $ancho ?>" required>
                </div>

                <div class="col-6">
                    <label for="largo" class="form-label">Largo:</label>
                    <input type="number" name="largo" step="any" id="largo" class="form-control"
                        value="<?php echo $largo ?>" required>
                </div>
            </div>

            <input type="hidden" name="id" value=" <?php echo $id ?> ">
            <div class="col text-center mt-2">
                <input type="submit" value="Actualizar" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>

<script src="js/selectPosicion.js"></script>

<?php
mysqli_close($conn);
?>