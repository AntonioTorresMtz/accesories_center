<?php
include("includes/header.php");
?>
    <div class="buscar">
        <form action="buscarProtector.php" method="POST"class="form-buscador">
            <select name="marca" id="marca" class="buscador-select">
                <option value="Iphone">Iphone</option>
                <option value="Samsung">Samsung</option>
                <option value="Motorola">Motorola</option>
                <option value="Huawei">Huawei</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="OPPO">OPPO</option>
                <option value="LG">LG</option>
                <option value="Universal">Universal</option>
            </select>
            <input type="text" placeholder="Modelo" class="buscador" name="modelo">
            <input type="submit" value="Buscar" class="buscador-btn">
        </form>
    </div>



<?php



if(isset($_POST["marca"]) and isset($_POST["modelo"])){


    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];

    $compatibles = "SELECT id_protector   FROM `modelo_funda` WHERE modelo = '$modelo'";
    $resultado = mysqli_query($conn, $compatibles);
    $id;

    while($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['id_protector'];
    }

    $compatibles = "SELECT modelo FROM modelo_funda WHERE id_protector = '$id'";
    $resultado = mysqli_query($conn, $compatibles);
    ?>
    <div class="resultado">
        <div class="modelos">
            <h3>Modelos Compatibles</h3>
            <?php
            while($row = mysqli_fetch_assoc($resultado)) { ?>
                <p><?php echo $row['modelo']; ?></p>
                
            <?php } ?>
        </div>
        <div class="detalles">
            <div class="posicion">
                <?php
                    $posicion = "SELECT a.nombre, b.cantidad FROM `posicion` a INNER JOIN protectores b on a.id_posicion = b.posicion
                    WHERE id_protector = '$id' and b.marca = '$marca'";
                    $total=0;
                    $resultado = mysqli_query($conn, $posicion);
                    while($row = mysqli_fetch_assoc($resultado)) {
                        $total = $row["cantidad"];
                        echo "<p> Posicion: ". $row['nombre'] . "</p>";
                    }
                ?>
            </div>
            <div class="cantidad">
                <?php
                    $cantidad = "SELECT cantidad, tipo  FROM tipo_protector WHERE id_protector = '$id'";
                    $resultado = mysqli_query($conn, $cantidad);
                    echo "<p> Cantidad: " . $total ."</p>";
                    while($row = mysqli_fetch_assoc($resultado)) {
                        echo "<p>" . $row["tipo"] . ": " . $row['cantidad'] . "</p>";
                    }
                ?>
            </div>
        </div>
    </div>

<?php

}

include("includes/footer.php");
?>

