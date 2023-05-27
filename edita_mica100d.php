<?php
include('db.php');
include("includes/header.php");

$id = $_GET['id'];
//echo $id;

$query = "SELECT m.marca as name_marca, a.marca, a.cantidad, a.posicion,
p.nombre as name_posicion, p.muro
FROM micas100d a
INNER JOIN marca m ON m.id_marca = a.marca
INNER JOIN posicion p ON p.id_posicion = a.posicion
WHERE id_mica100d = '$id'";
$resultado = mysqli_query($conn, $query);

$fila = mysqli_fetch_assoc($resultado);
$marca = $fila["marca"];
$marca_name = $fila["name_marca"];
$posicion = $fila["posicion"];
$posicion_name = $fila["name_posicion"];
$muro = $fila["muro"];
$cantidad = $fila["cantidad"];


?>

<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="editar/e_general100d.php" method="POST" class="col-md-3 shadow p-3 align-self-start">
            <div class="row text-center">
                <h4>Modificar mica de privacidad</h4>
            </div>

            <div class="col-12">
                <label for="boton" class="form-label">Compatibles:</label>
                <?php
                $name = "";
                $names = "SELECT m.nombre, m.id_modelo FROM modelos m
                INNER JOIN nombre_mica100d a ON a.nombre_modelo = m.id_modelo
                INNER JOIN micas100d b ON a.id_mica100d = b.id_mica100d
                WHERE b.id_mica100d = '$id'";

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

            <div class="col-12">
                <label for="marca" class="form-label">Marca:</label>
                <select name="marca" id="marca" class="form-select">
                    <option value="<?php echo $marca ?>" selected> <?php echo $marca_name ?> </option>
                    <?php
                    $pos = "SELECT id_marca, marca FROM marca ORDER BY id_marca ASC";
                    $resultado = mysqli_query($conn, $pos);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id_marca = $row["id_marca"] ?>
                        <option value="<?php echo $id_marca ?>"> <?php echo $row["marca"] ?> </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col">
                <label for="boton" class="form-label">Cantidad:</label>
                <input type="number" name="cantidad" step="1" id="cantidad" placeholder="Cantidad" class="form-control"
                    value="<?php echo $cantidad ?>" required>
            </div>

            <div class="col-12">
                <label class="form-label" for="muro">Muro:</label>
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

            <div class="col-12">
                <label for="posicion" class="form-label">Posicion:</label>
                <select name="posicion" id="posicion" class="form-select">
                    <option value="<?php echo $posicion ?>" selected> <?php echo $posicion_name ?> </option>

                </select>
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