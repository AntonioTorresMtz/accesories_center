<?php
include('db.php');
include("includes/header.php");

$id = $_GET['id'];
echo $id;

$query = "SELECT m.marca as name_marca, a.marca,  a.posicion, p.nombre as name_posicion, p.muro
FROM protectores a
INNER JOIN marca m ON m.id_marca = a.marca
INNER JOIN posicion p ON p.id_posicion = a.posicion
WHERE id_protector = '$id'";
$resultado = mysqli_query($conn, $query);

$fila = mysqli_fetch_assoc($resultado);
$marca = $fila["marca"];
$marca_name = $fila["name_marca"];
$posicion = $fila["posicion"];
$posicion_name = $fila["name_posicion"];
$muro = $fila["muro"];
?>

<div class="container">
    <div class="row justify-content-center mt-3">
        <form action="editar/e_generalProtector.php" method="POST"
            class="col-md-4 shadow p-3 align-self-start contenedor_formulario">
            <div class="row text-center">
                <h4>Modificar protector</h4>
            </div>

            <div class="col-12">
                <label for="boton" class="form-label">Compatibles:</label>
                <?php
                $name = "";
                $names = "SELECT m.nombre, m.id_modelo FROM modelos m
                INNER JOIN modelo_funda a ON a.tipo_modelo = m.id_modelo
                INNER JOIN protectores b ON a.id_protector = b.id_protector
                WHERE b.id_protector = '$id'";

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

            <div class="col">
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

            <div class="col">
                <label for="posicion" class="form-label">Posicion:</label>
                <select name="posicion" id="posicion" class="form-select">
                    <option value="<?php echo $posicion ?>" selected> <?php echo $posicion_name ?> </option>

                </select>
            </div>

            <div class="col text-center">
                <p>Protectores:</p>
            </div>
            <div class="row text-center">
                <div class="col-6">Tipo:</div>
                <div class="col-6">Cantidad:</div>
            </div>
            <div class="col">
                <?php
                $query = "SELECT np.nombre, np.id_nombreTipo, tp.cantidad FROM tipo_protector tp 
                RIGHT JOIN nombre_tipo_protector np ON np.id_nombreTipo = tp.tipo
                INNER JOIN protectores p ON p.id_protector = tp.id_protector
                WHERE p.id_protector = '$id'";

                $result = mysqli_query($conn, $query);

                // Verificar si hay resultados
                if (mysqli_num_rows($result) > 0) {
                    // Recorrer los resultados y generar los inputs dinámicos
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nombre = $row['nombre'];
                        $id_tipo = $row['id_nombreTipo'];
                        $cantidad = $row['cantidad'];

                        // Generar el input dinámico                
                        echo '<div class="row mb-2"><div class="col-6"><input readonly type="text" name="nombre[]" value="' . $nombre . '" class="form-control"> </div>';
                        echo '<input hidden type="text" name="id_tipo[]" value="' . $id_tipo . '" class="form-control"> ';
                        echo '<div class="col-6"><input type="number" name="cantidad[]" value="' . $cantidad . '" class="form-control"> </div> </div>';
                    }
                }

                ?>
            </div>

            <input type="hidden" name="id" value=" <?php echo $id ?> ">
            <div class="col text-center">
                <input type="submit" value="Actualizar" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>

<script src="js/selectPosicion.js"></script>

<?php
mysqli_close($conn);
?>