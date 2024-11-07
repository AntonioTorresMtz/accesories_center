document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarDesbloqueo);
});

function validarDesbloqueo(evento) {
  evento.preventDefault();
  var marca = document.getElementById("no_contrasena").checked;
  if (marca) {
    type =
      "text/javascript" >
      Swal.fire(
        "Pide que se desbloquee el telefono!",
        "No es posbile revisar el telefono sin estar desbloqueado",
        "warning"
      );
    return;
  } else {
    this.submit();
  }
}
