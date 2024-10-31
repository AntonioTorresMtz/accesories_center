formulario = document.getElementById("formulario");

$(document).ready(function () {
  $("#imei").focus();
  $("#imei").on("keyup", function () {
    var busca = $("#imei").val();
    $.ajax({
      type: "POST",
      url: "buscar/telefonoCambio.php",
      data: { busca: busca },
    })

      .done(function (resultado) {
        $("#result").html(resultado);
      })
      .fail(function () {
        alert("Ocurrio un error");
      });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarSolucion);
});

function validarSolucion(evento) {
  evento.preventDefault();
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
    this.submit();
  }
}
