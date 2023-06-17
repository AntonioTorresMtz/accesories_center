<?php
function mica9h($id_mica, $id_modelo)
{
    include('../db.php');
    $sp = "SP_FUSIONAR_9H";
    $resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo')");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        $_SESSION['fusion9h'] = "Fusion hecha";
        header("Location: ../fusionarMica9h.php");
        exit();
    }
    mysqli_close($conn);
}

function mica9d($id_mica, $id_modelo)
{
    include('../db.php');
    $sp = "SP_FUSIONAR_9D";
    $resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo')");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        $_SESSION['fusion9d'] = "Fusion hecha";
        header("Location: ../fusionarMica9h.php");
        exit();
    }
    mysqli_close($conn);
}

function mica100d($id_mica, $id_modelo)
{
    include('../db.php');
    $sp = "SP_FUSIONAR_100D";
    $resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo')");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        $_SESSION['fusion100d'] = "Fusion hecha";
        header("Location: ../fusionarMica9h.php");
        exit();
    }
    mysqli_close($conn);
}

function micaCamara($id_mica, $id_modelo)
{
    include('../db.php');
    $sp = "SP_FUSIONAR_CAMARA";
    $resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo')");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        $_SESSION['fusionCamara'] = "Fusion hecha";
        header("Location: ../fusionarMica9h.php");
        exit();
    }
    mysqli_close($conn);
}

function micaCurva($id_mica, $id_modelo)
{
    include('../db.php');
    $sp = "SP_FUSIONAR_CURVA";
    $resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo')");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        $_SESSION['fusionCurva'] = "Fusion hecha";
        header("Location: ../fusionarMica9h.php");
        exit();
    }
    mysqli_close($conn);
}

function protector($id_mica, $id_modelo)
{
    include('../db.php');
    $sp = "SP_FUSIONAR_PROTECTOR";
    $resultado = mysqli_query($conn, "CALL $sp ('$id_mica', '$id_modelo')");

    if (!$resultado) {
        echo 'Error consulta al programador <br>';
        //printf("Errormessage: %s\n", $conn->error);
    } else {
        $_SESSION['fusionProtector'] = "Fusion hecha";
        header("Location: ../fusionarMica9h.php");
        exit();
    }
    mysqli_close($conn);
}

?>