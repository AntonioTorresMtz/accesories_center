document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarModelos);
});

function validarModelos(evento) {
  evento.preventDefault();
  var modelo = document.getElementById("modelo").value;
  if (modelo == 0) {
    type =
      "text/javascript" >
      Swal.fire(
        "Error en la fusion!",
        "Selecciona primero el modelo a conservar",
        "error"
      );
    return;
  } else {
    var modelo2 = document.getElementById("modelo2").value;
    if (modelo2 == 0) {
      type =
        "text/javascript" >
        Swal.fire(
          "Error en la fusion!",
          "Selecciona primero el modelo a fusionar",
          "error"
        );
      return;
    } else {
      this.submit();
    }
  }
}
