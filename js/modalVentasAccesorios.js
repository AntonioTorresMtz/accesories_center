$(document).ready(function () {
  console.log("Hola");
  $(".btn-editar").click(function () {
    var idVenta = $(this).data("id");
    $("#modalEditar").modal("show");
    // Aquí puedes realizar una solicitud AJAX para obtener los datos de la venta correspondiente
    $.ajax({
      type: "POST",
      url: "buscar/buscarVentaAccesorios.php", // Ruta a tu script PHP para obtener los datos de la venta
      data: { ventaId: idVenta }, // Enviar el ID de la venta al script PHP
      dataType: "json", // Especificar el tipo de datos esperados en la respuesta
      success: function (response) {
        // Aquí puedes actualizar los campos del formulario en el modal con los datos obtenidos
        $("#cantidad").val(response.cantidad);
        $("#precio").val(response.precio);
        $("#descuento").val(response.descuento);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Ocurrió un error al obtener los datos de la venta.");
        console.log("Estado de la solicitud: " + textStatus);
        console.log("Error lanzado: " + errorThrown);
      },
    });

    // Luego, puedes actualizar el contenido del modal con los datos obtenidos

    // Ejemplo de actualización del título del modal con el ID de la venta
    $("#modalEditarLabel").text("Editar Venta ID: " + idVenta);
    var valor = "<input type='hidden' id='idVenta' name='id' value='"+ idVenta + "'/>"
    $("#id").append(valor);

    // Ejemplo de actualización del formulario con los datos obtenidos
    // $('#modalEditar').find('#campo').val(datos.campo);
  });

  // Cerrar el modal al hacer clic en el botón "Cerrar"
  $(".modal-footer .btn-secondary").click(function () {
    $("#modalEditar").modal("hide");
  });
});
