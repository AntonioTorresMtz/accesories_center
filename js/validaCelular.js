document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formulario").addEventListener("submit", validar);
});

function validar(evento) {
  evento.preventDefault();
  var marca = document.getElementById("marca").value;
  if (marca == 0) {
    type =
      "text/javascript" >
      Swal.fire(
        "¡Error al agregar celular!",
        "Selecciona primero una marca",
        "error"
      );
    return;
  } else {
    this.submit();
  }
}
