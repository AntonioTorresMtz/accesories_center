<?php
if (isset($_SESSION['desfusion'])) {
    echo "<script type='text/javascript'>Swal.fire(
                        'Modelos divididos!',
                        'Se han dividido los modelos con exito',
                        'success'
                      )</script>";
    unset($_SESSION['desfusion']);
}

?>