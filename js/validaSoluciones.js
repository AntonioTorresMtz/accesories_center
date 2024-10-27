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
    var camposOcultos = formulario.querySelectorAll('[style*="display: none"]');
    camposOcultos.forEach(function (campo) {
      campo.disabled = true; // Deshabilitar campos ocultos
    });

    if (formulario.reportValidity()) {
      formulario.submit(); // Envía el formulario si es válido
    }
     camposOcultos.forEach(function(campo) {
      campo.disabled = false;
    });
  }
}
