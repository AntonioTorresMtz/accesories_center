function buscar() {
  // Obtener los valores de los campos del formulario
  var producto = document.getElementById("producto").value;
  var maximo = document.getElementById("maximo").value;

  // Enviar los datos a un servidor
  enviarDatos(producto, maximo);
}

function enviarDatos(producto, maximo) {
  $.ajax({
    type: "POST",
    url: "buscar/buscadorExistencias.php",
    data: { producto: producto, maximo: maximo },
  })
    .done(function (resultado) {
      $("#result").html(resultado);
    })
    .fail(function () {
      alert("Ocurrió un error");
    });
}
