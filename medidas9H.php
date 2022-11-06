<?php
include("includes/header.php");
require_once 'conexion.php';
if(isset($_POST['buscar'])){
    $ancho = $_POST["ancho"];
    $largo = $_POST["largo"];
    $order = $_POST["order"];
} else{

}

?>
<div class="container">
    <h3 class="display-6 mt-4 text-dark text-center font-weight-bold">Buscar mica por medidas</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST" class="row g-3 mt-3 align-items-center">
        <div class="col-3">
            <label class="form-label" for="ancho">Ancho:</label>
            <input type="number" class="form-control" placeholder="Ancho" aria-label="Username" aria-describedby="basic-addon1"
            name="ancho" id="ancho" step="any">   
        </div>

        <div class="col-3">
            <label class="form-label" for="largo">Largo:</label>
            <input type="number" class="form-control" placeholder="Largo" aria-label="Username" aria-describedby="basic-addon1"
            name="largo" id="largo" step="any">
        </div>

        <div class="col-4">
            <label class="form-label" for="order">Ordenar por:</label>
            <select class="form-select" name="order" id="order">
                <option value="ancho">Ancho</option>
                <option value="largo">Largo</option>
            </select>
        </div>

        <div class="col-2">
            <input type="submit" name="buscar" value="Buscar" id="buscar" class="btn btn-dark">
        </div>

    </form>
</div>


<div class="container">
    <div class="table-responsive">
    <table class="table table-striped table-borderless table-hover">
        <thead>
            <tr>
            <th>Marca</th>
                <th>Modelo</th>
                <th>Ancho</th>
                <th>Largo</th>
                <th>Cantidad</th>
                <th>Camara</th>
                <th>Boton</th>
                <th>Posicion</th>
            </tr>
        </thead>
        <tbody id="result">
            <?php  
                if(isset($_POST['buscar'])){
                    $mysqli = getConnexion();
                if($order == "largo"){
                    $query="SELECT m.nombre as model, ma.marca, b.ancho, b.largo, b.boton, b.camara, c.nombre, b.cantidad FROM nombre_mica9h a
                    INNER JOIN micas9h b ON b.id_mica9h = a.id_mica9h
                    INNER JOIN posicion c ON c.id_posicion = b.posicion
                    INNER JOIN modelos m ON m.id_modelo = a.nombre_modelo
                    INNER JOIN marca ma ON ma.id_marca = b.marca
                    WHERE b.ancho <= $ancho and b.largo <= $largo ORDER BY b.largo DESC";
                } else{
                    $query="SELECT m.nombre as model, ma.marca, b.ancho, b.largo, b.boton, b.camara, c.nombre, b.cantidad FROM nombre_mica9h a
                    INNER JOIN micas9h b ON b.id_mica9h = a.id_mica9h
                    INNER JOIN posicion c ON c.id_posicion = b.posicion
                    INNER JOIN modelos m ON m.id_modelo = a.nombre_modelo
                    INNER JOIN marca ma ON ma.id_marca = b.marca
                    WHERE b.ancho <= $ancho and b.largo <= $largo ORDER BY b.ancho DESC";
                }
            
                $res = $mysqli->query($query);
                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr> <td>" . $row['marca']. "</td>".
                    "<td>" . $row['model']. "</td>".
                    "<td>" . $row['ancho']. "</td>".
                    "<td>" . $row['largo']. "</td>".
                    "<td>" . $row['cantidad']. "</td>".
                    "<td>" . $row['camara']. "</td>".
                    "<td>" . $row['boton']. "</td>".
                    "<td>" . $row['nombre']. "</td>".
                    "</tr>";
                }

                }
                ?>
        </tbody>
    </table>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
<!-- <script src="js/buscaMedida9h.js"></script> -->
<?php
include("includes/footer.php");
?>
