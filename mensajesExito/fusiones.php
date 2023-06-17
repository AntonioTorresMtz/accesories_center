<?php
if (isset($_SESSION['fusion9h'])) {
  echo "<script type='text/javascript'>Swal.fire(
                        'Nueva compatibilidad!',
                        'Se ha creado una nueva compatibilidad en mica normal!',
                        'success'
                      )</script>";
  unset($_SESSION['fusion9h']);
}
if (isset($_SESSION['fusion9d'])) {
  echo "<script type='text/javascript'>Swal.fire(
                        'Nueva compatibilidad!',
                        'Se ha creado una nueva compatibilidad en mica completa!',
                        'success'
                      )</script>";
  unset($_SESSION['fusion9d']);
}
if (isset($_SESSION['fusion100d'])) {
  echo "<script type='text/javascript'>Swal.fire(
                        'Nueva compatibilidad!',
                        'Se ha creado una nueva compatibilidad en mica de privacidad!',
                        'success'
                      )</script>";
  unset($_SESSION['fusion100d']);
}
if (isset($_SESSION['fusionCamara'])) {
  echo "<script type='text/javascript'>Swal.fire(
                        'Nueva compatibilidad!',
                        'Se ha creado una nueva compatibilidad en mica para camara!',
                        'success'
                      )</script>";
  unset($_SESSION['fusionCamara']);
}
if (isset($_SESSION['fusionCurva'])) {
  echo "<script type='text/javascript'>Swal.fire(
                        'Nueva compatibilidad!',
                        'Se ha creado una nueva compatibilidad en mica curva!',
                        'success'
                      )</script>";
  unset($_SESSION['fusionCurva']);
}
if (isset($_SESSION['fusionProtector'])) {
  echo "<script type='text/javascript'>Swal.fire(
                      'Nueva compatibilidad!',
                      'Se ha creado una nueva compatibilidad en protectores!',
                      'success'
                    )</script>";
  unset($_SESSION['fusionProtector']);
}
?>