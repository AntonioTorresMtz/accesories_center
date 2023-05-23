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
    var valor =
      "<input type='hidden' id='idVenta' name='id' value='" + idVenta + "'/>";
    $("#id").append(valor);

    // Ejemplo de actualización del formulario con los datos obtenidos
    // $('#modalEditar').find('#campo').val(datos.campo);
  });

  // Cerrar el modal al hacer clic en el botón "Cerrar"
  $(".modal-footer .btn-secondary").click(function () {
    $("#modalEditar").modal("hide");
  });

  // Obtener una lista de todos los botones con la clase .btn-danger
  var botonesBorrar = document.querySelectorAll(".btn-danger");

  // Iterar sobre los botones y agregar el event listener a cada uno
  botonesBorrar.forEach(function (boton) {
    boton.addEventListener("click", function () {
      // Obtener el valor del atributo data-id del botón actual
      var idVenta = this.getAttribute("data-id");

      // Código a ejecutar con el idVenta obtenido
      console.log("ID de venta: " + idVenta);

      Swal.fire({
        title: "¿Estas seguro de borrar la venta?",
        text: "Los cambios no se revertiran",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          // Realizar una solicitud AJAX al script PHP
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "registros/borrar_venta.php", true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );
          xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              // Manejar la respuesta del script PHP si es necesario
              console.log(xhr.responseText);
            }
          };
          xhr.send("idVenta=" + idVenta);
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",            
            confirmButtonText: "Ok",
          }).then((result) => {
            // Acción al hacer clic en el botón "Ok"
            if (result.isConfirmed) {
              location.reload(true);
            }
          });
        }
      });
    });
  });
});
