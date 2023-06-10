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
      Swal.fire("Error en la fusion!", "Selecciona primero el modelo a conservar", "warning");
    return;
  } else {
    if (document.getElementById("modelo")) {
      var modelo2 = document.getElementById("modelo2").value;
      if (modelo2 == 0) {
        type =
          "text/javascript" >
          Swal.fire(
            "Error en la fusion!",
            "Selecciona primero el modelo a separar",
            "warning"
          );
        return;
      } else {
        this.submit();
      }
    } else {
      this.submit();
    }
  }
}
