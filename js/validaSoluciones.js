formulario = document.getElementById("formulario");
var resultado_imei = false;

$(document).ready(function () {
  $("#imei").focus();
  $("#imei").on("keyup", function () {
    var busca = $("#imei").val();
    $.ajax({
      type: "POST",
      url: "buscar/telefonoCambio.php",
      data: { busca: busca },
      dataType: "json", // Especifica que la respuesta es JSON
    })
      .done(function (respuesta) {
        // Limpia el contenedor antes de mostrar el resultado
        $("#result").empty();
        resultado_imei = respuesta.resultado;
        console.log("Respuesta del server: " + respuesta.resultado);
        if (respuesta.resultado) {
          // Itera sobre los resultados y muestra cada uno
          respuesta.data.forEach(function (telefono) {
            $("#result").append(
              "<p><b>Teléfono:</b> " + telefono.modelo + "</p>"
            );
          });
        } else {
          // Muestra el mensaje de error si no se encontraron resultados
          $("#result").append("<p> " + respuesta.mensaje + "</p>");
        }
      })
      .fail(function () {
        alert("Ocurrió un error");
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
  console.log(resultado_imei);
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
    if (resultado_imei) {
      this.submit();
      console.log("Aqui se enviaria el formulario");
    } else {
      type =
        "text/javascript" >
        Swal.fire(
          "IMEI no encontrado!",
          "No se encontro un celular para el cambio con el IMEI ingresado, verificalo",
          "error"
        );
    }
  }
}
