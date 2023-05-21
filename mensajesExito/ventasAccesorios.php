<?php
if (isset($_SESSION['actualizacion'])) {
    echo "HOLAAAA";
    switch ($_SESSION['actualizacion']) {
        case "exito":
            echo "<script type='text/javascript'>Swal.fire(
                'Datos en ventas modificados!',
                'Se han modificado los datos!',
                'success'
              )</script>";
            unset($_SESSION['actualizacion']);
            break;
        case "2":
            echo "<script type='text/javascript'>Swal.fire(
                'Venta exitosa!',
                'Se ha realizado la venta!',
                'success'
              )</script>";
            unset($_SESSION['actualizacion']);
            break;
    }
}

?>