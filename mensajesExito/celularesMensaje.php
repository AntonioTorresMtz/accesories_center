<?php
if (isset($_SESSION['exito'])) {
    switch ($_SESSION['exito']) {
        case "1":
            echo "<script type='text/javascript'>Swal.fire(
                'Celular guardado!',
                'Se ha agregado un celular al inventario!',
                'success'
              )</script>";
            unset($_SESSION['exito']);
            break;
        case "2":
            echo "<script type='text/javascript'>Swal.fire(
                'Venta exitosa!',
                'Se ha realizado la venta!',
                'success'
              )</script>";
            unset($_SESSION['exito']);
            break;
    }
}

?>