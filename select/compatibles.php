<?php
include '../db.php';
$modelo = $_POST['modelo'];

$query = "SELECT a.nombre, c.cantidad, c.id_mica9h, c.notas,
d.muro, d.nombre AS place, c.ancho, c.largo  FROM modelos a
INNER JOIN nombre_mica9h b
ON b.nombre_modelo = a.id_modelo
INNER JOIN micas9h c
ON c.id_mica9h = b.id_mica9h
INNER JOIN  posicion d
ON c.posicion = d.id_posicion
WHERE a.id_modelo = '$modelo'";

$resultado = mysqli_query($conn, $query);
$total = mysqli_num_rows($resultado);
if ($total == 0) {
    $html = "<div class='row'>
                <div class='col-lg-4'>
                    <div class='card'>
                        <div class='card-header'>
                            <h5>Micas Normales</h5>
                        </div>
                    <div class='row card-body'>
                        <div class='col-6'>                       
                            <p>No hay existencias :(</p>
                        </div>
                    </div>
                </div>
            </div>";
} else {
    $mica9h = 0;
    $html = "<div class='row'>
                <div class='col-lg-4'>
                    <div class='card'>
                        <div class='card-header'>
                            <h5>Micas Normales</h5>
                        </div>
            ";
    while ($row = $resultado->fetch_assoc()) {
        $mica9h = $row["id_mica9h"];
        $html = $html . "<div class='row card-body'>

                            <div class='col-12'>
                                <a href='edita_mica9h.php?id=" . $mica9h . "'> Editar </a>
                            </div> 

                            <div class='col-4'>
                                <p>Muro: " . $row["muro"] . "</p>
                            </div> 
                            <div class='col-4'>
                                <p>Posicion: " . $row["place"] . "</p>
                            </div>              
    
                            <div class='col-4'>
                                <p>Cantidad: " . $row["cantidad"] . "<p>
                            </div>
                            <div class='col-6'>
                                <p>Medidas: " . $row["ancho"] . "x" . $row["largo"] . "<p>
                            </div>
                            <hr>                             
                            <div class='col-12'>
                                <p>Notas: " . $row["notas"] . "</p>
                            </div>  
                            <hr> 
                            <div class='col'>
                                <p>Compatibles: <br>";
    }

    $query2 = "SELECT GROUP_CONCAT(m.marca, ' ', b.nombre SEPARATOR ', ') as nombre
    FROM modelos b 
       INNER JOIN nombre_mica9h a
       ON b.id_modelo = a.nombre_modelo
       INNER JOIN  micas9h c
       ON a.id_mica9h = c.id_mica9h
       INNER JOIN marca m ON m.id_marca = b.marca
       WHERE c.id_mica9h = '$mica9h'
        GROUP BY a.id_mica9h";

    $resultado = mysqli_query($conn, $query2);


    while ($row = $resultado->fetch_assoc()) {
        $html = $html . $row["nombre"];
    }

    $html = $html . "</div>
                </div>
            </div> 
    </div>";
}

$query9d = "SELECT a.nombre, c.cantidad, c.id_mica9d, c.notas,
d.muro, d.nombre AS place,
 c.ancho, c.largo  FROM modelos a
INNER JOIN nombre b
ON b.nombre_modelo = a.id_modelo
INNER JOIN micas9d c
ON c.id_mica9d = b.id_mica
INNER JOIN  posicion d
ON c.posicion = d.id_posicion
WHERE a.id_modelo = '$modelo'";

$resultado = mysqli_query($conn, $query9d);
$total = mysqli_num_rows($resultado);
if ($total == 0) {
    $html = $html . "<div class='col-lg-4'>
    <div class='card'>
        <div class='card-header'>
            <h5>Micas Completas</h5>
        </div>
        <div class='row card-body'>
            <div class='col-6'>                       
                <p>No hay existencias :(</p>
            </div>
        </div>
    </div>
</div>";
} else {
    $mica9d = 0;

    $html = $html . "<div class='col-lg-4'>
        <div class='card'>
            <div class='card-header'>
                <h5>Micas Completas</h5>
            </div>
            ";
    while ($row = $resultado->fetch_assoc()) {
        $mica9d = $row["id_mica9d"];
        $html = $html . "<div class='row card-body'>
                            <div class='col-12'>
                                <a href='edita_mica9d.php?id=" . $mica9d . "'> Editar </a>
                            </div> 
                                <div class='col-4'>
                                    <p>Muro: " . $row["muro"] . "</p>
                                </div> 
                                <div class='col-4'>
                                    <p>Posicion: " . $row["place"] . "</p>
                                </div>              
                            
                                <div class='col-4'>
                                    <p>Cantidad: " . $row["cantidad"] . "<p>
                                    </div>
                                    <div class='col-6'>
                                        <p>Medidas: " . $row["ancho"] . "x" . $row["largo"] . "<p>
                                        </div>
                                        <hr>
                                        <div class='col-12'>
                                            <p>Notas: " . $row["notas"] . "</p>
                                        </div>    
                                        <hr> 
                                        <div class='col'>
                                            <p>Compatibles: <br>";
    }

    $query2 = "	 SELECT GROUP_CONCAT(m.marca, ' ', b.nombre SEPARATOR ', ') AS nombre FROM modelos b 
    INNER JOIN nombre a
    ON b.id_modelo = a.nombre_modelo
    INNER JOIN  micas9d c
    ON a.id_mica = c.id_mica9d
    INNER JOIN marca m ON m.id_marca = b.marca
    WHERE c.id_mica9d = '$mica9d'
    GROUP BY a.id_mica";

    $resultado = mysqli_query($conn, $query2);


    while ($row = $resultado->fetch_assoc()) {
        $html = $html . $row["nombre"];
    }

    $html = $html . "</div>
        </div>
    </div>
</div>";

}

$queryProtector = "SELECT a.nombre, a.muro, b.cantidad, b.id_protector FROM posicion a 
INNER JOIN protectores b
ON b.posicion = a.id_posicion
INNER JOIN modelo_funda c
ON c.id_protector = b.id_protector
WHERE c.tipo_modelo = '$modelo'";

$resultado = mysqli_query($conn, $queryProtector);
$total = mysqli_num_rows($resultado);
if ($total == 0) {
    $html = $html . "<div class='col-lg-4'>
    <div class='card'>
        <div class='card-header'>
            <h5>Protectores</h5>
        </div>
        <div class='row card-body'>
            <div class='col-6'>                       
                <p>No hay existencias :(</p>
            </div>
        </div>
    </div>
</div>";
} else {
    $protector = 0;
    $html = $html . "<div class='col-lg-4'>
        <div class='card'>
            <div class='card-header'>
                <h5>Protectores</h5>
            </div>
            ";
    while ($row = $resultado->fetch_assoc()) {
        $protector = $row["id_protector"];
        $html = $html . "<div class='row card-body'>
        <div class='col-12'>
            <a href='edita_protector.php?id=" . $protector . "'> Editar </a>
        </div>
        <div class='col-4'>
            <p>Muro: " . $row["muro"] . "<p>
        </div>

        <div class='col-4'>
            <p>Posicion: " . $row["nombre"] . "</p>
        </div>              
    
        <div class='col-4'>
            <p>Total: " . $row["cantidad"] . "</p>
        </div>
        <hr> 
        <div class='col'>
            <p>Tipos de Protector: <br>";
    }
    $query2 = "SELECT a.nombre, b.cantidad FROM nombre_tipo_protector a
    INNER JOIN tipo_protector b
    ON a.id_nombreTipo = b.tipo
    INNER JOIN protectores c
    ON b.id_protector = c.id_protector
    WHERE c.id_protector = '$protector' and b.cantidad > 0";

    $resultado = mysqli_query($conn, $query2);


    while ($row = $resultado->fetch_assoc()) {
        $html = $html . "<div class='col-12'>
                                <p>" . $row["nombre"] . ": " . $row["cantidad"] . "</p>
                            </div>";
    }

    $query2 = "SELECT GROUP_CONCAT(m.marca, ' ', b.nombre SEPARATOR ', ') AS nombre , c.notas FROM modelos b 
    INNER JOIN modelo_funda a
    ON b.id_modelo = a.tipo_modelo
    INNER JOIN  protectores c
    ON a.id_protector = c.id_protector
    INNER JOIN marca m ON m.id_marca = b.marca
    WHERE c.id_protector  = '$protector'
    GROUP BY a.id_protector";
    $notas_protector = '';
    $resultado = mysqli_query($conn, $query2);
    $html = $html . "<hr>
                        <div class='col-12'>
                        <p>Compatibles:
                            <br>";
    while ($row = $resultado->fetch_assoc()) {
        $html = $html . $row["nombre"];
        $notas_protector = $row['notas'];

    }

    $html = $html . "</p>
                </div>
                <hr>
                <div class='col-12'>
                    <p>Notas: " . $notas_protector . "</p>
                </div>   
            </div>
        </div>
    </div>
</div>";

}

$query100d = "SELECT a.nombre, c.cantidad, c.notas,
c.id_mica100d, d.muro, d.nombre AS place FROM modelos a
INNER JOIN nombre_mica100d b
ON b.nombre_modelo = a.id_modelo
INNER JOIN micas100d c
ON c.id_mica100d = b.id_mica100d
INNER JOIN  posicion d
ON c.posicion = d.id_posicion
WHERE a.id_modelo = '$modelo'";

$resultado = mysqli_query($conn, $query100d);
$total = mysqli_num_rows($resultado);
if ($total == 0) {
    $html = $html . "<div class='col-lg-4 mt-4'>
    <div class='card'>
        <div class='card-header'>
            <h5>Micas Micas de Privacidad</h5>
        </div>
        <div class='row card-body'>
            <div class='col-6'>                       
                <p>No hay existencias :(</p>
            </div>
        </div>
    </div>
</div>";
} else {
    $mica100d = 0;

    $html = $html . "<div class='col-lg-4'>
        <div class='card'>
            <div class='card-header'>
                <h5>Micas de Privacidad</h5>
            </div>
            ";
    while ($row = $resultado->fetch_assoc()) {
        $mica100d = $row["id_mica100d"];
        $html = $html . "<div class='row card-body'>
        <div class='col-12'>
            <a href='edita_mica100d.php?id=" . $mica100d . "'> Editar </a>
        </div> 
        <div class='col-4'>
            <p>Muro: " . $row["muro"] . "</p>
        </div>   
        <div class='col-4'>
            <p>Posicion: " . $row["place"] . "</p>
        </div>              
    
        <div class='col-4'>
            <p>Cantidad: " . $row["cantidad"] . "<p>
            </div>
            <hr> 
            <div class='col-12'>
                <p>Notas: " . $row["notas"] . "</p>
            </div> 
            <hr>
            <div class='col'>
                <p>Compatibles: <br>";
    }

    $query2 = "SELECT GROUP_CONCAT(m.marca, ' ', b.nombre SEPARATOR ', ') AS nombre FROM modelos b 
    INNER JOIN nombre_mica100d a
    ON b.id_modelo = a.nombre_modelo
    INNER JOIN  micas100d c
    ON a.id_mica100d = c.id_mica100d
    INNER JOIN marca m ON m.id_marca = b.marca
    WHERE c.id_mica100d = '$mica100d'
    GROUP BY a.id_mica100d";

    $resultado = mysqli_query($conn, $query2);


    while ($row = $resultado->fetch_assoc()) {
        $html = $html . $row["nombre"];
    }

    $html = $html . "</div>
        </div>
    </div>
</div>";

}

$queryCamara = "SELECT a.nombre, c.cantidad, c.id_micaCamara, c.notas,
d.muro, d.nombre AS place FROM modelos a
INNER JOIN nombre_micacamara b
ON b.modelo = a.id_modelo
INNER JOIN micas_camara c
ON c.id_micaCamara = b.id_micaCamara
INNER JOIN  posicion d
ON c.posicion = d.id_posicion
WHERE a.id_modelo = '$modelo'";

$resultado = mysqli_query($conn, $queryCamara);
$total = mysqli_num_rows($resultado);
if ($total == 0) {
    $html = $html . "<div class='col-lg-4 mt-4'>
    <div class='card'>
        <div class='card-header'>
            <h5>Micas para camara</h5>
        </div>
        <div class='row card-body'>
            <div class='col-6'>                       
                <p>No hay existencias :(</p>
            </div>
        </div>
    </div>
</div>";
} else {
    $micaCamara = 0;

    $html = $html . "<div class='col-lg-4'>
        <div class='card'>
            <div class='card-header'>
                <h5>Micas para camara</h5>
            </div>
            ";
    while ($row = $resultado->fetch_assoc()) {
        $micaCamara = $row["id_micaCamara"];
        $html = $html . "<div class='row card-body'>
        <div class='col-12'>
        <a href='edita_micaCamara.php?id=" . $micaCamara . "'> Editar </a>
    </div> 
        <div class='col-4'>
            <p>Muro: " . $row["muro"] . "</p>
        </div>
        <div class='col-4'>
            <p>Posicion: " . $row["place"] . "</p>
        </div>              
    
        <div class='col-4'>
            <p>Cantidad: " . $row["cantidad"] . "<p>
            </div>
            <hr>             
            <div class='col-12'>
                <p>Notas: " . $row["notas"] . "</p>
            </div> 
            <hr> 
            <div class='col'>
                <p>Compatibles: <br>";
    }

    $query2 = "SELECT GROUP_CONCAT(m.marca, ' ', b.nombre SEPARATOR ', ') AS nombre FROM modelos b 
    INNER JOIN nombre_micacamara a
    ON b.id_modelo = a.modelo
    INNER JOIN  micas_camara c
    ON a.id_micaCamara= c.id_micaCamara
    INNER JOIN marca m ON m.id_marca = b.marca
    WHERE c.id_micaCamara = '$micaCamara'
    GROUP BY a.id_micaCamara";

    $resultado = mysqli_query($conn, $query2);


    while ($row = $resultado->fetch_assoc()) {
        $html = $html . $row["nombre"];
    }

    $html = $html . "</div>
        </div>
    </div>
</div>";

}

$queryCurva = "SELECT a.nombre, c.cantidad, c.id_micaCurva, c.notas,
d.muro, d.nombre AS place FROM modelos a
INNER JOIN nombre_micacurva b
ON b.nombre_modelo = a.id_modelo
INNER JOIN micascurva c
ON c.id_micaCurva = b.id_micaCurva
INNER JOIN  posicion d
ON c.posicion = d.id_posicion
WHERE a.id_modelo = '$modelo'";

$resultado = mysqli_query($conn, $queryCurva);
$total = mysqli_num_rows($resultado);
if ($total == 0) {
    $html = $html . "<div class='col-lg-4 mt-4'>
    <div class='card'>
        <div class='card-header'>
            <h5>Micas Curvas</h5>
        </div>
        <div class='row card-body'>
            <div class='col-6'>                       
                <p>No hay existencias :(</p>
            </div>
        </div>
    </div>
</div>";
} else {
    $micaCurva = 0;

    $html = $html . "<div class='col-lg-4'>
        <div class='card'>
            <div class='card-header'>
                <h5>Micas curvas</h5>
            </div>
            ";
    while ($row = $resultado->fetch_assoc()) {
        $micaCurva = $row["id_micaCurva"];
        $html = $html . "<div class='row card-body'>
        <div class='col-12'>
            <a href='edita_micaCurva.php?id=" . $micaCurva . "'> Editar </a>
        </div> 
        <div class='col-4'>
            <p>Muro: " . $row["muro"] . "</p>
        </div>
        <div class='col-4'>
            <p>Posicion: " . $row["place"] . "</p>
        </div>              
    
        <div class='col-4'>
            <p>Cantidad: " . $row["cantidad"] . "<p>
            </div>
            <hr>             
            <div class='col-12'>
                <p>Notas: " . $row["notas"] . "</p>
            </div> 
            <hr> 
            <div class='col'>
                <p>Compatibles: <br>";
    }

    $query2 = "SELECT GROUP_CONCAT(m.marca, ' ', b.nombre SEPARATOR ', ') AS nombre FROM modelos b 
    INNER JOIN nombre_micacurva a
    ON b.id_modelo = a.nombre_modelo
    INNER JOIN  micascurva c
    ON a.id_micaCurva = c.id_micaCurva
    INNER JOIN marca m ON m.id_marca = b.marca
    WHERE c.id_micaCurva = '$micaCurva'
    GROUP BY a.id_micaCurva";

    $resultado = mysqli_query($conn, $query2);


    while ($row = $resultado->fetch_assoc()) {
        $html = $html . $row["nombre"];
    }

    $html = $html . "</div>
        </div>
    </div>
</div>";

}


echo $html;

?>