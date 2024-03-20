<?php
if (isset ($_SESSION['exito'])) {
  switch ($_SESSION['exito']) {
    case "1":
      echo "<script type='text/javascript'>Swal.fire(
                'Producto Apartado!',
                'Se ha apartado un nuevo producto con exito!',
                'success'
              )</script>";
      unset($_SESSION['exito']);
      break;
    case "2":
      echo "<script type='text/javascript'>Swal.fire(
                'Abono registrado!',
                'Se ha realizado un nuevo abono.!',
                'success'
              )</script>";
      unset($_SESSION['exito']);
      break;
    case "3":
      echo "<script type='text/javascript'>Swal.fire(
                  'Recarga registrada!',
                  'Se ha registrado una recarga con exito.!',
                  'success'
                )</script>";
      unset($_SESSION['exito']);
      break;
  }
}

