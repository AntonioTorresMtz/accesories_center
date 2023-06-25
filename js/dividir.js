var tipoProducto = 0;
var modeloGlobal = 0;
var customValue = 0;

$(document).ready(function () {
  $("#marca").change(function () {
    $("#marca option:selected").each(function () {
      producto = $(this).val();
      marca = producto;
      //console.log(producto)
      console.log("Producto: " + tipoProducto);
      switch (tipoProducto) {
        case "1":
          $.post(
            "select/modeloSelect9h.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "2":
          $.post(
            "select/modeloSelect9d.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "3":
          $.post(
            "select/modeloSelect100d.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "4":
          $.post(
            "select/modeloSelectCamara.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "5":
          console.log("Cincooo");
          $.post(
            "select/modeloSelectCurva.php",
            { producto: producto },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
        case "6":
          console.log("Seis");
          $.post(
            "select/protectorModelo.php",
            { marca: marca },
            function (data) {
              $("#modelo").html(data);
            }
          );
          break;
      }
    });
  });

  $("#producto").change(function () {
    $("#producto option:selected").each(function () {
      tipoProducto = $(this).val();
      console.log("Producto:");
      console.log(tipoProducto);
      var marcaSelect = $("#marca");
      marcaSelect.val("1");
    });
  });

  $("#modelo").change(function () {
    $("#modelo option:selected").each(function () {
      modelo = $(this).val();
      console.log("Id del modelo");
      console.log(modelo);
    });
  });

  /*AQUI*/
  $("#modelo").change(function () {
    $("#modelo option:selected").each(function () {
      model = $(this).val();
      customValue = $(this).data("idmodelo");
      console.log(customValue);
      $.post(
        "select/modeloCompatible.php",
        { model: model, producto: tipoProducto, id_modelo: customValue },
        function (data) {
          $("#modelo2").html(data);
        }
      );
      if (tipoProducto == "6") {
        mostrarTiposProtector(model);
      }
    });
  });

  function mostrarTiposProtector(model) {
    //Eliminamos el contenedor de cantidad normal
    var contenedor_cantidad1 = document.getElementById(
      "contenedor_cantidades1"
    );
    var contenedor_cantidad2 = document.getElementById(
      "contenedor_cantidades2"
    );

    if (contenedor_cantidad1) {
      contenedor_cantidad1.remove();
    }
    if (contenedor_cantidad2) {
      contenedor_cantidad2.remove();
    }

    $.post(
      "select/tiposProtectores.php",
      { id_modelo: model, opc:1 },
      function (data) {
        $("#cantidades").html(data);
      }
    );
    $.post(
      "select/tiposProtectores.php",
      { id_modelo: model, opc:2 },
      function (data) {
        $("#cantidades2").html(data);
      }
    );
  }

  $("#modelo2").change(function () {
    $("#modelo2 option:selected").each(function () {
      modelo = $(this).val();
      console.log("Id del modelo 2");
      console.log(modelo);
    });
  });
});
