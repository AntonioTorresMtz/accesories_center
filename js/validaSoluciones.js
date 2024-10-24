formulario = document.getElementById("formulario");

function validarSolucion() {
  var solucion = document.getElementById("solucion").value;
  if (solucion == 0) {
    type =
      "text/javascript" >
      Swal.fire(
        "Error en la solucion!",
        "Selecciona primero un tipo de solucion",
        "error"
      );
    return;
  } else {
    formulario.submit();
  }
}
