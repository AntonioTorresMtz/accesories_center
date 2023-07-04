document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarMarca);
});

function validarMarca(evento) {
  evento.preventDefault();
  var tipo = document.getElementById("tipo").value;
  if (tipo == 0) {
    type =
      "text/javascript" >
      Swal.fire(
        "Error al editar!",
        "Selecciona primero un tipo de protector",
        "error"
      );
    return;
  } else {
    this.submit();
  }
}
